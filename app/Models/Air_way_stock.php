<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Air_way_stock extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','waybill_type','cod','prepaid','rvp'];

    public function Clients()
    {
        return $this->belongsTo(Client::class, 'user_id', 'id');
    }
}
