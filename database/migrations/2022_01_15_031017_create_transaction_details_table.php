<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaction_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('food_id');
            $table->unsignedInteger('price');
            $table->timestamps();

            $table->foreign('food_id')->references('id')->on('foods');
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaction_details');
    }
}
