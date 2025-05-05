<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pin_Code extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['pin_code','city_name','status'];

    public function client()
    {
        return $this->hasOne(Client::class, "id", "client_id");
    }

    public function courier()
    {
        return $this->hasOne(Courier::class, "id","vendor_id");
    }
}
