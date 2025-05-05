<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Api_status extends Model
{
    use HasFactory;

    protected $fillable = ['courier','status_name','status'];

    public function courierss()
    {
        return $this->belongsTo(All_api::class, 'courier', 'id');
    }

}
