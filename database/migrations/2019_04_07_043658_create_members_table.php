<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatemembersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('age');
            $table->string('phone');
            $table->string('alternative_phone');
            $table->text('address');
            $table->string('email');
            $table->string('gender');
            $table->string('id_card'); // ktp
            $table->string('passport_number'); //passport
          
           
            $table->string('photo');
            $table->string('visa_number');
            $table->string('type');
            $table->integer('status');
          
            $table->integer('province_id')->unsigned();
            $table->foreign('province_id')->references('id')->on('provinces')->onUpdate('cascade')->onDelete('cascade');

            $table->integer('district_id')->unsigned();
            $table->foreign('district_id')->references('id')->on('districts')->onUpdate('cascade')->onDelete('cascade');

            $table->integer('subdistrict_id')->unsigned();
            $table->foreign('subdistrict_id')->references('id')->on('subdistricts')->onUpdate('cascade')->onDelete('cascade');

            $table->string('village_id');
           

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('members');
    }
}
