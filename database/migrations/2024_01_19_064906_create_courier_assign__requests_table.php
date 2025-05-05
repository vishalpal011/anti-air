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
        Schema::create('courier_assign__requests', function (Blueprint $table) {
            $table->id();
            $table->longText('request_id');
            $table->longText('booking_id');
            $table->longText('courier_id');
            $table->longText('accept_status');
            $table->longText('notification_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courier_assign__requests');
    }
};
