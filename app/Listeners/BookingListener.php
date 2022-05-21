<?php

namespace App\Listeners;

use App\Models\Book;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class BookingListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param object $event
     * @return void
     */
    public function handle($event)
    {
        /**
         * @var User $user
         */
        $user = $event->user;
        $booking = $user->bookings()->create([
            'booked_until' => Carbon::now($event->location->timezone)->addDays($event->days),
            'booked_blocks_count' => $event->bookedBlocks->count(),
        ]);

        /**
         * @var Book $booking
         */
        $booking->blocks()->sync($event->bookedBlocks);
    }
}
