<?php

namespace App\Models\Hotel;

use App\Models\Apartment\Apartment;
use App\Models\Booking\Booking;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $table = "hotels";

    protected $guarded = [];
    public $timestamps = true;

    public function apartment()
    {
        return$this->belongsTo(Apartment::class);
    }


}
