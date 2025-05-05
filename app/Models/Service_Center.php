<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service_Center extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['service_code','service_name','pincode','city_name','state','region','center_address','status'];
}
