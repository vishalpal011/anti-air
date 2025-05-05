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
        Schema::create('mail_settings', function (Blueprint $table) {
            $table->id();
            $table->longText('client_mail');
            $table->longText('awb_inventory_shortage');
            $table->longText('ndr_email');
            $table->longText('wallet_recharged');
            $table->longText('legal_agreement');
            $table->longText('agreement_acceptance_email');
            $table->longText('paytm_settlement_email');
            $table->longText('not_pick_report');
            $table->longText('date');
            $table->timestamps();
        });
    }

    /** * Reverse the migrations. */

    public function down(): void
    {
        Schema::dropIfExists('mail_settings');
    }
};
