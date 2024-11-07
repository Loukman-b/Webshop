<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id('payment_id');
            $table->unsignedBigInteger('order_id');
            $table->dateTime('payed_on')->nullable();
            $table->string('pay_method')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
