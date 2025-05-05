<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['first_name','last_name','company_name','email','password','phone','otp','business_type','gst_doc','adhar_doc','pan_doc','terms','privacy','average_monthly_orders','agreed_rates','sales_person','sales_person_email','assigined_kam','cod_cycle','billing_cycle','client_id','loss_liablity','user_name','billing_pin_code','city','states','account','B2B','shipping_label','vendor_and_center','status'];
}
