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
        Schema::create('uploaded_pins', function (Blueprint $table) {
            $table->id();
            $table->longText('client');
            $table->longText('courier');
            $table->longText('pincode');
            $table->longText('shortcode');
            $table->longText('valuecappings');
            $table->longText('cod');
            $table->longText('prepaid');
            $table->longText('reverse_pickup');
            $table->longText('surface');
            $table->longText('air');
            $table->longText('codepriority');
            $table->longText('pppriority');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uploaded_pins');
    }
};
