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
        Schema::create('service__centers', function (Blueprint $table) {
            $table->id();
            $table->longText('service_code')->nullable();
            $table->longText('service_name')->nullable();
            $table->longText('pin_code')->nullable();
            $table->longText('type')->nullable();
            $table->longText('city_name')->nullable();
            $table->longText('state')->nullable();
            $table->longText('region')->nullable();
            $table->longText('center_address')->nullable();
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
        Schema::dropIfExists('service__centers');
    }
};
