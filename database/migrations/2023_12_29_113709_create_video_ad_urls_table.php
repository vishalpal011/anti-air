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
        Schema::create('video_ad_urls', function (Blueprint $table) {
            $table->id();
            $table->longText('client_id')->nullable();
            $table->longText('vendor_id')->nullable();
            $table->longText('title')->nullable();
            $table->longText('link')->nullable();
            $table->longText('start_date')->nullable();
            $table->longText('end_date')->nullable();
            $table->longText('description')->nullable();
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
        Schema::dropIfExists('video_ad_urls');
    }
};
