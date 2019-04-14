<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Signup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('signups', function(Blueprint $table)
        {
            $table->increments('id');
            $table->boolean('gender');
            $table->boolean('personality');
            $table->integer('user_id')->index()->unsigned();
//            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('name');
            $table->string('father_name');
            $table->string('email');
            $table->string('company')->nullable();
            $table->string('company_type')->nullable();
            $table->string('national_code');
            $table->string('post_code');
            $table->string('mobile');
            $table->string('tell');
            $table->unsignedInteger('city_id')->nullable();
            $table->text('address')->nullable();
            $table->text('education')->nullable();
            $table->text('career')->nullable();
            $table->string('recommender')->nullable();
            $table->text('suggestion')->nullable();
            $table->unsignedBigInteger('transaction_id')->nullable();
            $table->boolean('active')->nullable();
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
        Schema::drop('signups');
    }
}
