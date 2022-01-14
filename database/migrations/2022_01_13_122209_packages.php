<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Packages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('company_id');
            $table->string('name');
            $table->integer('status')->default(1)->comment('0:pasif 1:aktif'); 
            $table->string('start_date');
            $table->string('end_date');
             $table->timestamps();
            $table->foreign('company_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
            });
           
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
