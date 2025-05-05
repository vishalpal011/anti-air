<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourierAssign_Request_b2c extends Model
{
    use HasFactory;
    protected $fillable = ['booking_id', 'courier_id','accept_status'];
}
