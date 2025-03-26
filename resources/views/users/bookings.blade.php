@extends('layouts.app')

@section('content')
    <div class="hero-wrap js-fullheight" style="background-image: url('{{asset('assets/images/room-1.jpg')}}')" >
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
                <div class="col-md-7 ftco-animate"><h1 class="subheading">My Bookings</h1>
                    <h1 class="mb-4"></h1>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="container">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Check In</th>
            <th scope="col">Check Out</th>
            <th scope="col">Days</th>
            <th scope="col">Price</th>
            <th scope="col">Room Name</th>
            <th scope="col">Hotel Name </th>
            <th scope="col">Status</th>



        </tr>
        </thead>
        <tbody>
        @foreach($bookings as $booked)
            <tr>
            <td>{{$booked->name}}</td>
                <td>{{$booked->email}}</td>
                <td>{{$booked->phone_number}}</td>
                <td>{{$booked->check_in}}</td>
                <td>{{$booked->check_out}}</td>
                <td>{{$booked->days}}</td>
                <td>{{$booked->price}}</td>
                <td>{{$booked->room->name}}</td>
                <td>{{$booked->hotel->name}}</td>
                <td>{{$booked->status}}</td>

            </tr>
        @endforeach
        </tbody><
    </table>
    /div>
@endsection
