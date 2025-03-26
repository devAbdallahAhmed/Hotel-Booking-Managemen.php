<?php

namespace App\Http\Controllers;

use App\Models\Apartment\Apartment;
use App\Models\Hotel\Hotel;
use Illuminate\Http\Request;

class HomeController extends Controller
{

//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $hotels = Hotel::select()->orderBy('id','desc')->take(3)->get();
        $apartments = Apartment::select()->orderBy('id','desc')->take(4)->get();

        return view('home',compact('hotels','apartments'));

    }

    public function about()
    {

        return view('pages.about');
    }

    public function services()
    {
        return view('pages.services');

    }

    public function contact()
    {
        return view('pages.contact');

    }

}
