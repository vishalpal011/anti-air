<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lable_design extends Model
{
    use HasFactory;
    protected $fillable = ['design_name','blade_name'];
}
