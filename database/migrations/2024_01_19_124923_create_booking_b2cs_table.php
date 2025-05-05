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
        Schema::create('booking_b2cs', function (Blueprint $table) {
            $table->id();
            $table->longText('business_type');
            $table->longText('order_no');
            $table->longText('awb_no');
            $table->longText('payment_mode');
            $table->longText('item_price');
            $table->longText('cod_due');
            $table->longText('receiver_name');
            $table->longText('receiver_address');
            $table->longText('receiver_address_2');
            $table->longText('receiver_state');
            $table->longText('receiver_city');
            $table->longText('receiver_pincode');
            $table->longText('receiver_contactno');
            $table->longText('receiver_alt_contactno');
            $table->longText('item_sku');
            $table->longText('item_name');
            $table->longText('item_height');
            $table->longText('item_length');
            $table->longText('item_weight');
            $table->longText('item_qty');
            $table->longText('order_type');
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('warehouse_id');
            $table->longText('status')->nullable();
            $table->longText('courier_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_b2cs');
    }
};
