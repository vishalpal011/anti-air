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
        Schema::create('label_settings', function (Blueprint $table) {
            $table->id();
            $table->longText('client')->nullable();
            $table->longText('design_id')->nullable();
            $table->longText('admin')->nullable();
            $table->longText('sold_by')->nullable();
            $table->longText('shipping_address')->nullable();
            $table->longText('product_section')->nullable();
            $table->longText('declaration')->nullable();
            $table->longText('return_address')->nullable();
            $table->longText('consignee_mobile')->nullable();
            $table->longText('display_logo')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('label_settings');
    }
};
