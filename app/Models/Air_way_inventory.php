<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Air_way_inventory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id','awb_codes','used_status'];
}
