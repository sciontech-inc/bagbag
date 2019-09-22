<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCashiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cashiers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('receipt_no');
            $table->string('resident');
            $table->string('tin');
            $table->string('contact');
            $table->string('address');
            $table->string('discount')->nullable();
            $table->bigInteger('sub_total')->nullable();
            $table->bigInteger('total_amount')->nullable();
            $table->bigInteger('pay_amount')->nullable();
            $table->bigInteger('change')->nullable();
            $table->string('status')->default('Completed');
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
        Schema::dropIfExists('cashiers');
    }
}
