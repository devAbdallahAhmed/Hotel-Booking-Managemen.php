<?php

namespace App\Models\Apartment;

use App\Models\Booking\Booking;
use App\Models\Hotel\Hotel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;
    protected $table = 'apartmentS';
    protected $guarded = ['hotel_id'];
    protected $timestamp = true;

    public function hotel()
    {
        return$this->belongsTo(Hotel::class);
    }

    public function booking()
    {
        return$this->belongsTo(Booking::class);
    }

}
