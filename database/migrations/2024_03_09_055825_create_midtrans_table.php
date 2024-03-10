<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('midtrans', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_type');
            $table->string('transaction_time');
            $table->string('transaction_status');
            $table->string('transaction_id');
            $table->string('status_message');
            $table->string('status_code');
            $table->string('signature_key');
            $table->string('reference_id');
            $table->string('payment_type');
            $table->string('order_id');
            $table->string('merchant_id');
            $table->string('gross_amount');
            $table->string('fraud_status');
            $table->string('expiry_time');
            $table->string('currency');
            $table->string('acquirer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('midtrans');
    }
};
