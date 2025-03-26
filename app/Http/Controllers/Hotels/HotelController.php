<?php

namespace App\Http\Controllers\Hotels;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoomBookingRequest;
use App\Models\Apartment\Apartment;
use App\Models\Booking\Booking;
use App\Models\Hotel\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DateTime;
use Illuminate\Support\Facades\Session;

class HotelController extends Controller
{

    public function rooms($id)
    {
        $getRoom = Apartment::where('hotel_id',$id)->get();
        return view('hotels.rooms',compact('getRoom'));
    }

    public function roomDetails($id)
    {
        $getRooms = Apartment::find($id);
        return view('hotels.roomDetails',compact('getRooms'));

    }

    public function roomBooking(RoomBookingRequest $request,$id)
    {
        $datetime1 = new DateTime($request->check_in);
        $datetime2 = new DateTime($request->check_out);
        $interval = $datetime1->diff($datetime2);
        $days = $interval->format('%a');
        $room = Apartment::find($id);
        $hotel = Hotel::find($id);

        $total_Price = $days * $room->price;
          $bookRooms =  Booking::create([
            'name'=>$request->name,
            'email'=> $request->email,
            'phone_number'=> $request->phone_number,
            'check_in'=> $request->check_in,
            'check_out'=> $request->check_out,
            'days'=>$days,
            'price'=>$total_Price ,
            'user_id'=> Auth::user()->id,
           'room_name'=> $room->id,
            'hotel_name'=> $hotel->id,
        ]);


        $totalPrice = $days * $room->price;
        Session::put('price', $totalPrice); // تخزين القيمة في الجلسة

        $getPrice = Session::get('price');
        return redirect()->route('hotel.pay',compact('getPrice'));
    }
    public function payWithPaypal()
    {
     return view('hotels.pay');
    }

    public function success()
    {
        return view('hotels.success');
    }

}

