<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->longText('client_id')->nullable();
            $table->longText('warehouse_id')->nullable();
            $table->longText('lr_no')->nullable();
            $table->longText('order_no')->nullable();
            $table->longText('transport_mode')->nullable();
            $table->longText('vendor_name')->nullable();
            $table->longText('cd_no')->nullable();
            $table->longText('edd')->nullable();
            $table->longText('receiver_name')->nullable();
            $table->longText('receiver_address')->nullable();
            $table->longText('receiver_address_2')->nullable();
            $table->longText('receiver_state')->nullable();
            $table->longText('receiver_city')->nullable();
            $table->longText('receiver_pincode')->nullable();
            $table->longText('receiver_contact_no')->nullable();
            $table->longText('receiver_alt_contact_no')->nullable();
            $table->longText('remarks')->nullable();
            $table->longText('invoice_no')->nullable();
            $table->longText('payment_mode')->nullable();
            $table->longText('item_price')->nullable();
            $table->longText('cod_due')->nullable();
            $table->longText('to_pay')->nullable();
            $table->longText('cash_received')->nullable();
            $table->longText('cft')->nullable();
            $table->longText('item_weight_kg')->nullable();
            $table->longText('item_height_cm')->nullable();
            $table->longText('item_length_cm')->nullable();
            $table->longText('item_width_cm')->nullable();
            $table->longText('receiver_gstin')->nullable();
            $table->longText('invoice_amount_rs')->nullable();
            $table->longText('e_way_bill')->nullable();
            $table->longText('fragile')->nullable();
            $table->longText('rov_type')->nullable();
            $table->longText('status')->nullable();
            $table->longText('disputed_status')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
