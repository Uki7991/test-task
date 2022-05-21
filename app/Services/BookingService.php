<?php


namespace App\Services;


use App\Events\BlocksBookedEvent;
use App\Models\Block;
use App\Models\Book;
use App\Models\Location;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BookingService
{
    public function book($data)
    {
        /**
         * @var Location $location
         */
        $location = $data['location'];
        $freeBlocksIdsForBooking = $location->freeBlocks()->with('room:id,temperature')
            ->where('temperature', '<', $data['temperature'] - 2)
            ->orderByDesc('temperature')
            ->limit((int)ceil($data['product_volume'] / 2))
            ->get()
            ->pluck('id');

        $freeBlocksForBookingSql = Block::whereIn('id', $freeBlocksIdsForBooking);
        /**
         * @var User $user
         */
        $user = request()->user();

        DB::transaction(function () use ($freeBlocksForBookingSql, $data, $user) {
            $freeBlocksForBookingSql->update(['booked' => true]);
            $bookedBlocks = $freeBlocksForBookingSql->get();

            $booking = $user->bookings()->create([
                'booked_until' => Carbon::now($data['location']->timezone)->addDays($data['time']),
                'booked_blocks_count' => $bookedBlocks->count(),
                'access_code' => Str::random(12),
                'status' => Book::ACTIVE,
                'cost' => $bookedBlocks->count() * Carbon::now($data['location']->timezone)->addDays($data['time'])->diffInDays(Carbon::now($data['location']->timezone), true),
            ]);

            /**
             * @var Book $booking
             */
            $booking->blocks()->attach($freeBlocksForBookingSql->get());
        });

        return $freeBlocksForBookingSql->with(['room:id,temperature,location_id', 'room.location'])->get(['id', 'room_id', 'booked']);
    }

    public function unbook()
    {
        $bookedBlocksToUnbook = Block::query()
            ->where('booked', true)
            ->with(['room.location', 'bookings'])
            ->whereHas('bookings', function ($q) {
                $q->whereBetween('booked_until', [Carbon::now()->subDays(2), Carbon::now()->addDays(2)]);
            })
            ->get();

        $bookedBlocksToUnbook->each(function ($block) {
            $timezone = $block->room->location->timezone;
            $latestBooking = $block->bookings()->latest()->first();

            $bookedUntilTime = Carbon::parse($latestBooking->bookedUntil, $timezone);
            $startOfTheDay = Carbon::now($timezone)->startOfDay();
            $endOfTheDay = Carbon::now($timezone)->endOfDay();

            if ($startOfTheDay <= $bookedUntilTime && $endOfTheDay >= $bookedUntilTime) {
                DB::transaction(function () use ($block, $latestBooking) {
                    $block->update(['booked' => false]);
                    $latestBooking->update(['status' => Book::EXPIRED]);
                });
            }
        });
    }
}
