<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class forword_pincodeaudit_b2c extends Model
{
    use HasFactory;
    protected $fillable = ['booking_id', 'pincode','status'];
}
