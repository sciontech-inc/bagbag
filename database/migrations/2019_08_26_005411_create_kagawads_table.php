<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKagawadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kagawads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('firstname');
			$table->string('middlename');
			$table->string('surname');
			$table->string('position');
			$table->string('about');
			$table->string('address');
			$table->string('contact');
			$table->string('image');
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
        Schema::dropIfExists('kagawads');
    }
}
