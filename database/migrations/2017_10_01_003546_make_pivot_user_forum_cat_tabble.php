<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakePivotUserForumCatTabble extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('user_forum_cats', function(Blueprint $table)
//        {
//            $table->integer('user_id')->index()->unsigned();
//            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
//            $table->integer('cat_id')->index()->unsigned();
//            $table->foreign('cat_id')->references('id')->on('forums_cat')->onDelete('cascade');
//        });
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
