<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateschedulesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id');
           
            $table->integer('member_id')->unsigned();
            $table->foreign('member_id')->references('id')->on('members')->onUpdate('cascade')->onDelete('cascade');

            $table->string('invoice_id');
         

             $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');

          
            $table->date('departure_date');
            $table->string('flight');
            $table->string('airport');
            $table->string('hotel');
            $table->string('type');
            $table->integer('status');
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
        Schema::drop('schedules');
    }
}
