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
        Schema::create('lable_designs', function (Blueprint $table) {
            $table->id();
            $table->longText('design_name')->nullable();
            $table->longText('blade_name')->nullable();
            $table->longText('status')->nullable();
            $table->longText('edited_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lable_designs');
    }
};
