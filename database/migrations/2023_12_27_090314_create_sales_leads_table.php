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
        Schema::create('sales_leads', function (Blueprint $table) {
            $table->id();
            $table->longText('company_name')->nullable();
            $table->longText('brand_name')->nullable();
            $table->longText('vendor_name')->nullable();
            $table->longText('decision_maker_name')->nullable();
            $table->longText('decicion_maker_number')->nullable();
            $table->longText('decicion_maker_email')->nullable();
            $table->longText('contact_person_name')->nullable();
            $table->longText('contact_person_number')->nullable();
            $table->longText('contact_person_email')->nullable();
            $table->longText('lead_date')->nullable();
            $table->longText('sales_person_name')->nullable();
            $table->longText('service_type')->nullable();
            $table->longText('volume')->nullable();
            $table->longText('lead_type')->nullable();
            $table->longText('office_address')->nullable();
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
        Schema::dropIfExists('sales_leads');
    }
};
