<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courier_comments extends Model
{
    use HasFactory;

    protected $fillabel = ['courier','status_name','courier_comments'];


    public function courierss()
    {
        return $this->belongsTo(All_api::class, 'courier', 'id');
    }
}
