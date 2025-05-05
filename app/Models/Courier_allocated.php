<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

 
class Courier_allocated extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['client_id','courier_id','priority','status'];

    public function clients()
    {
        return $this->belongsTo(Client::class, 'client_id','id');
    }

    public function couriers()
    {
        return $this->belongsTo(Courier::class, 'courier_id','id');
    }

}
