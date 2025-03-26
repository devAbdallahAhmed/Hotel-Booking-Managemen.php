<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\Apartment\Apartment;
use App\Models\Hotel\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AdminsController extends Controller
{

    public function index()
    {

        return view('admins.index');
    }
    public function viewLogin()
    {
        return view('admins.login');
    }

    public function checkLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $remember = $request->filled('remember_me');

        if (auth()->guard('admin')->attempt($request->only('email', 'password'), $remember)) {
            return redirect()->route('admins.dashboard')->with('success', 'Logged in successfully.');
        }
        return back()->withInput()->withErrors(['login' => 'Invalid email or password.']);
    }

    public function AllAdmins()
    {
        $admins = Admin::all();

        return view('admins.all', compact('admins'));
    }

    public function createAdmins()
    {
        return view('admins.create');
    }

    public function storeAdmins(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        Admin::create([
            'name'=> $request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)

        ]);
     return redirect()->route('admins.dashboard')->with('success', 'Admin created successfully.');
    }

    public function AllHotel()
    {
        $AllHotel = Hotel::all();

        return view('admins.hotelAll', compact('AllHotel'));
    }

    public function createHotel()
    {
        return view('admins.createHotel');
    }

    public function storeHotel(Request $request){

        $request->validate([
            'name' => 'required',
            'image' => 'required',
            'description' => 'required',
            'location' => 'required',
        ]);

        $destinationPath = 'assets/images/';
        $myimage = $request->image->getClientOriginalName();
        $request->image->move(public_path($destinationPath), $myimage);

         Hotel::create([
           'name'=>$request->name,
           'image'=>$myimage,
           'description'=>$request->description,
           'location'=>$request->location
        ]);

        return redirect('all.hotel')->with(['success'=> 'The Created Hotel Successfully']);
    }
    public function ViewUpdate($id)
    {
        $update = Hotel::findOrFail($id);
        return view('admins.updateHotel', compact('update'));
    }

    public function updateHotel(Request $request, $id)
    {
        $update = Hotel::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        $update->update($validatedData);

        return redirect()->route('all.hotel')->with(['update' => 'The update was successful!']);
    }

    public function deleteHotel($id)
    {
        $delete = Hotel::findOrFail($id);
        if(File::exists(public_path('assets/images/' . $delete->image))){
            File::delete(public_path('assets/images/' . $delete->image));
        }else{
            //dd('File does not exists.');
        }
            $delete->delete();
        session()->flash('delete' , 'The Deleted Successfully');
        return back();
    }

    public function allRome()
    {

        $Romes = Apartment::all();

        return view('admins.allRomes',compact('Romes'));
    }

    public function createRome()
    {
        $hotel = Hotel::all();
        return view('admins.createRome',compact('hotel'));
    }


    public function storeRome(Request $request)
    {


         $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|numeric|min:0',
            'max_persons' => 'required|integer|min:1',
            'num_beds' => 'required|integer|min:1',
            'size' => 'required|numeric|min:1',
            'view' => 'required|string|max:255',
        ]);

        $destinationPath = 'assets/images/';
        $myimage = $request->image->getClientOriginalName();
        $request->image->move(public_path($destinationPath), $myimage);
        // حفظ البيانات
        Apartment::create([
            'name' => $request->name,
            'image' =>$myimage,
            'price' => $request->price,
            'max_persons' => $request->max_persons,
            'num_beds' => $request->num_beds,
            'size' => $request->size,
            'view' => $request->view,
            'hotel_id'=>$request->hotel_id
        ]);
        return redirect()->route('all.room')->with('success', 'Room created successfully!');




    }
}
