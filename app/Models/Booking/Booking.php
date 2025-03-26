<?php

namespace App\Models\Booking;

use App\Models\Apartment\Apartment;
use App\Models\Hotel\Hotel;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;


    protected $table = "bookings";

    protected $guarded = [];
    public $timestamps = true;

    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'hotel_name');
    }

    public function room()
    {
        return $this->belongsTo(Apartment::class, 'room_name');
    }

}
