<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('firstname');
            $table->string('middlename');
            $table->string('surname');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role')->nullable();
			$table->softDeletes();
            $table->rememberToken();  
            $table->timestamps();
        });
        DB::table('users')->insert(
            array(
                array('firstname' => 'Admininistrator','middlename' => '','surname' => '','email' => 'admin@gmail.com', 'password' => '$2y$10$mGVC8yPZ1V80w6/b6we2WOfvwV7ly8QB/YbMa6IIFe11Sr81jgulO',
                'role'=>'Super Admin'))
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
