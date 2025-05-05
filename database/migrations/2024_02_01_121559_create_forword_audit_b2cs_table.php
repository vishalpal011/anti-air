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
        Schema::create('forword_audit_b2cs', function (Blueprint $table) {
            $table->id();
            $table->longText('booking_id');
            $table->longText('response');
            $table->longText('pindcode');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forword_audit_b2cs');
    }
};
