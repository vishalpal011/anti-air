<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class forword_audit_b2c extends Model
{
    use HasFactory;

    protected $fillable = ['booking_id', 'response','pindcode'];
}
