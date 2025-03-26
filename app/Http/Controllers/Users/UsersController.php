<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Apartment\Apartment;
use App\Models\Booking\Booking;
use App\Models\Hotel\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{

    public function myBookings()
    {
        $bookings = Booking::where('user_id', Auth::id())
        ->with(['hotel', 'room'])
        ->get();

        return view('users.bookings', compact('bookings'));
    }
}
