<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sales_lead extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['company_name','brand_name','vendor_name','decision_maker_name','decicion_maker_number','decicion_maker_email','contact_person_name','contact_person_number','contact_person_email','lead_date','service_type','volume','lead_type','office_address','status'];
}
