<?php


namespace App\Http\Controllers\API\v1;


use App\Http\Resources\BookingResourceCollection;
use App\Models\User;
use Illuminate\Http\Request;

class BookController
{
    public function myBookings(Request $request)
    {
        /**
         * @var User $user
         */
        $user = $request->user();

        return BookingResourceCollection::make($user->bookings()->paginate(10));
    }
}
