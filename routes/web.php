<?php

use App\Http\Controllers\Admins\AdminsController;
use App\Http\Controllers\Users\UsersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index')->middleware('auth');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about')->middleware('auth');
Route::get('/services', [App\Http\Controllers\HomeController::class, 'services'])->name('services')->middleware('auth');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact')->middleware('auth');




    Route::group(['prefix' =>'hotel'] , function (){
    Route::get('/rooms/{id}',[App\Http\Controllers\Hotels\HotelController::class,'rooms'])->name('hotel.rooms');
    Route::get('/rooms-details/{id}',[App\Http\Controllers\Hotels\HotelController::class,'roomDetails'])->name('hotel.rooms.details');
    Route::post('/rooms-booking/{id}',[App\Http\Controllers\Hotels\HotelController::class,'roomBooking'])->name('hotel.rooms.booking');
    // pay
    Route::get('/pay',[App\Http\Controllers\Hotels\HotelController::class,'payWithPaypal'])->name('hotel.pay')->middleware('check.for.price');
    Route::get('/success',[App\Http\Controllers\Hotels\HotelController::class,'success'])->name('hotel.success')->middleware('check.for.price');

});
//Users
Route::get('users/my-booking',[UsersController::class,'myBookings'])->name('users.bookings')->middleware('auth:web');

//Admin Panel
Route::get('admins/login',[AdminsController::class,'viewLogin'])->name('view.login')->middleware('check.for.login');
Route::post('admins/login',[AdminsController::class,'checkLogin'])->name('check.login');

Route::group(['prefix'=> 'admins' , 'middleware' => 'auth:admin'], function () {
    Route::get('/index',[AdminsController::class,'index'])->name('admins.dashboard');
    Route::get('/all-admins',[AdminsController::class,'AllAdmins'])->name('all.admins');
    Route::get('/create-admins',[AdminsController::class,'createAdmins'])->name('create.admins');
    Route::post('/store-admins',[AdminsController::class,'storeAdmins'])->name('store.admins');


    //Hotel
    Route::get('/all-Hotel',[AdminsController::class,'AllHotel'])->name('all.hotel');
    Route::get('/create-Hotel',[AdminsController::class,'createHotel'])->name('create.hotel');
    Route::post('/create/Hotel',[AdminsController::class,'storeHotel'])->name('store.hotel');
    Route::get('/update/Hotel/{id}',[AdminsController::class,'ViewUpdate'])->name('view.hotel');
    Route::post('/update/Hotel/{id}',[AdminsController::class,'updateHotel'])->name('update.hotel');
    Route::get('/delete/Hotel/{id}',[AdminsController::class,'deleteHotel'])->name('delete.hotel');

    //book
    Route::get('/all/rome',[AdminsController::class,'allRome'])->name('all.rome');
    Route::get('/create/rome',[AdminsController::class,'createRome'])->name('create.rome');
    Route::post('/store/rome',[AdminsController::class,'storeRome'])->name('store.rome');


});

