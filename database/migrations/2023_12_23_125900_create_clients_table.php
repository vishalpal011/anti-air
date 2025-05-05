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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->longText('first_name')->nullable();
            $table->longText('last_name')->nullable();
            $table->longText('company_name')->nullable();
            $table->longText('email')->nullable();
            $table->longText('password')->nullable();
            $table->longText('phone')->nullable();
            $table->longText('otp')->nullable();
            $table->longText('business_type')->nullable();
            $table->longText('aadhar_card')->nullable();
            $table->longText('pan_card')->nullable();
            $table->longText('address_proof')->nullable();
            $table->longText('cancel_cheque')->nullable();
            $table->longText('bank_name')->nullable();
            $table->longText('ifsc_code')->nullable();
            $table->longText('account_number')->nullable();
            $table->longText('mobile_as_bank')->nullable();
            $table->longText('person_billing_address')->nullable();
            $table->longText('company_gst')->nullable();
            $table->longText('terms')->nullable();
            $table->longText('privacy')->nullable();
            $table->longText('average_monthly_orders')->nullable();
            $table->longText('agreed_rates')->nullable();
            $table->longText('sales_person')->nullable();
            $table->longText('sales_person_email')->nullable();
            $table->longText('assigined_kam')->nullable();
            $table->longText('cod_cycle')->nullable();
            $table->longText('billing_cycle')->nullable();
            $table->longText('client_id')->nullable();
            $table->longText('loss_liablity')->nullable();
            $table->longText('user_name')->nullable();
            $table->longText('billing_pin_code')->nullable();
            $table->longText('city')->nullable();
            $table->longText('states')->nullable();
            $table->longText('account')->nullable();
            $table->longText('B2B')->nullable();
            $table->longText('shipping_label')->nullable();
            $table->longText('vendor_and_center')->nullable();
            $table->longText('kyc_status')->nullable();
            $table->longText('wallet_balance')->nullable();
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
        Schema::dropIfExists('clients');
    }
};
