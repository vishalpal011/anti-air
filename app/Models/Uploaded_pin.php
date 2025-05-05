<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uploaded_pin extends Model
{
    use HasFactory;

    protected $fillable = ['client','courier','pincode','shortcode','valuecappings','cod','prepaid','reverse_pickup','surface','air','codepriority','pppriority'];

    public function clients()
    {
        return $this->hasOne(Client::class,"id", "client");
    }

    public function couriers()
    {
        return $this->hasOne(Courier::class,"id", "courier");
    }
}
