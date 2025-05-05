<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Courier extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['courier_id','courier_display_name','courier_registration_name','courier_rates','courier_cod_cycle','courier_zone','courier_billing','courier_loss','courier_weight','weight_dispute_timeline','status'];
}
