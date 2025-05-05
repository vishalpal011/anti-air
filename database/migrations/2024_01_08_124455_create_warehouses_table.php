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
        Schema::create('warehouses', function (Blueprint $table) {
            $table->id();
            $table->longText('client_id')->nullable();
            $table->longText('business_name')->nullable();
            $table->longText('warehouse_name')->nullable();
            $table->longText('warehouse_phone')->nullable();
            $table->longText('pin_code')->nullable();
            $table->longText('state')->nullable();
            $table->longText('city')->nullable();
            $table->longText('address')->nullable();
            $table->longText('status')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warehouses');
    }
};
