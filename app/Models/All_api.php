<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class All_api extends Model
{
    use HasFactory;

    protected $fillable = ['courier_name','status'];
}
