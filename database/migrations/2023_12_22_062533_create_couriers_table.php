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
        Schema::create('couriers', function (Blueprint $table) {
            $table->id();
            $table->longText('courier_id')->nullable();
            $table->longText('courier_display_name')->nullable();
            $table->longText('courier_registration_name')->nullable();
            $table->longText('courier_rates')->nullable();
            $table->longText('courier_cod_cycle')->nullable();
            $table->longText('courier_zone')->nullable();
            $table->longText('courier_billing')->nullable();
            $table->longText('courier_loss')->nullable();
            $table->longText('courier_weight')->nullable();
            $table->longText('weight_dispute_timeline')->nullable();
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
        Schema::dropIfExists('couriers');
    }
};
