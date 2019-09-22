<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('biodata_fingerprint')->nullable();
            $table->string('reference');
            $table->string('surname');
            $table->string('firstname');
            $table->string('middlename');
            $table->string('nickname');
            $table->string('resident_date');
            $table->string('citizenship');
            $table->string('gender');
            $table->string('civil_status');
            $table->string('birthday');
            $table->string('age');
            $table->string('birthplace');
            $table->string('contact_no');
            $table->string('current_address');
            $table->string('other_address')->nullable();
            $table->string('educational');
            $table->string('occupation');
            $table->string('card_presented');
            $table->string('email');
			$table->softDeletes();
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
        Schema::dropIfExists('residents');
    }
}
