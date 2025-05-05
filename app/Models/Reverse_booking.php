<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reverse_booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'business_type',
        'courier',
        'warehouse_id',
        'lr_no',
        'order_no',
        'transport_mode',
        'vendor_name',
        'cd_no',
        'edd',
        'receiver_name',
        'receiver_address',
        'receiver_address_2',
        'receiver_state',
        'receiver_city',
        'receiver_pincode',
        'receiver_contact_no',
        'receiver_alt_contact_no',
        'remarks',
        'invoice_no',
        'payment_mode',
        'item_price',
        'cod_due',
        'to_pay',
        'cash_received',
        'cft',
        'item_weight_kg',
        'item_height_cm',
        'item_length_cm',
        'item_width_cm',
        'receiver_gstin',
         'invoice_amount_rs',
        'e_way_bill',
        'fragile',
        'rov_type',
        'booking_type',
    ];
    public function clients()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }

    public function couriers()
    {
        return $this->belongsTo(Courier::class, 'courier', 'id');
    }

    public function warehouses()
    {
        return $this->belongsTo(warehouse::class, 'warehouse_id', 'id');
    }
}
