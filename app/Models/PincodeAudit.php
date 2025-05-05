<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PincodeAudit extends Model
{
    use HasFactory;

    protected $fillable = ['booking_id', 'pincode','status'];
}
