<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class warehouse extends Model
{
    use HasFactory;
    protected $fillable = ['id','client_id','business_name','warehouse_name','warehouse_phone','pin_code','state','city','address'];


    public function client()
    {
        return $this->belongsTo(Client::class, "client_id", "id");
    }
}
