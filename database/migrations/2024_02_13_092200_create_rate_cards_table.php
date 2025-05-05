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
        Schema::create('courier_rates', function (Blueprint $table) {
            $table->id();
            $table->longText('service_id')->nullable();
            $table->longText('courier_id')->nullable();
            $table->longText('type')->nullable();
            $table->longText('weight')->nullable();
            $table->longText('zone_a')->nullable();
            $table->longText('zone_b')->nullable();
            $table->longText('zone_c')->nullable();
            $table->longText('zone_d')->nullable();
            $table->longText('zone_e')->nullable();
            $table->longText('zone_f')->nullable();
            $table->longText('zone_g')->nullable();
            $table->longText('fsc_percentage')->nullable();
            $table->longText('gst_percentage')->nullable();
            $table->longText('cod')->nullable();
            $table->longText('cod_percentage')->nullable();
            $table->longText('other_charges')->nullable();
            $table->longText('cod_cycle')->nullable();
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
        Schema::dropIfExists('rate_cards');
    }
};
