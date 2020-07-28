<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('status');
            $table->unsignedBigInteger('amount');
            $table->string('email');
            $table->string('session_id');
            $table->string('description');
            $table->string('statement')->nullable();
            $table->string('account_md5')->nullable();
            $table->integer('method')->nullable();
            $table->integer('batch_id')->nullable();
            $table->integer('fee')->nullable();
            $table->unsignedBigInteger('p24_order_id')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
