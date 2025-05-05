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
        Schema::create('air_way_stocks', function (Blueprint $table) {
            $table->id();
            $table->string('user_id', 50)->nullable();
             $table->longText('waybill_type')->nullable();
            $table->longText('cod')->nullable();
            $table->longText('prepaid')->nullable();
            $table->longText('rvp')->nullable();
            $table->timestamp('deleted_at')->nullable();
             $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('air_way_stocks');
    }
};
