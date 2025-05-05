<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Courier_rate extends Model
{
    use HasFactory, SoftDeletes;

    public function couriers()
    {
        return $this->belongsTo(Courier::class, 'courier_id','id');
    }

    public function courier_service()
    {
        return $this->belongsTo(Courier_service::class, "service_id", "id");
    }
}
