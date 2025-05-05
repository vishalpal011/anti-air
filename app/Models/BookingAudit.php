<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingAudit extends Model
{
    use HasFactory;

    protected $fillable = ['booking_id', 'response','pindcode'];


    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
