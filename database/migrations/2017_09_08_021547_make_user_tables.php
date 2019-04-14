<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeUserTables extends Migration
{
    public function up()
    {

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('family');
            $table->string('username');
            $table->string('email',250)->unique();
            $table->string('password');
            $table->integer('state');
            $table->rememberToken();
            $table->timestamps();
        });

//        Schema::create('users_profile', function(Blueprint $table)
//        {
//            $table->increments('id');
//            $table->integer('users_id')->index()->unsigned();
//            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
//            $table->text('body');
//            $table->string('poster_firstname');
//            $table->string('poster_profile_image');
//            $table->mediumText('intro');
//            $table->text('description');
//            $table->timestamps();
//        });

        Schema::create('users_profile', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('users_id')->index()->unsigned();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('national_code');
            $table->string('gender');
            $table->date('birth');
            $table->string('country');
            $table->string('city');
            $table->string('tell');
        });
        Schema::create('users_social', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('users_id')->index()->unsigned();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('title');
            $table->string('link');
            $table->string('google+');
            $table->string('telegram');
            $table->string('instagram');
            $table->string('tweeter');
            $table->string('youtube');
            $table->string('aparat');
            $table->string('linkedin');
            $table->string('facebook');
            $table->string('karamun');
            $table->string('other1');
            $table->string('other2');
        });
        Schema::create('users_edu', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('users_id')->index()->unsigned();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('title');
            $table->date('start_date');
            $table->date('finish_date');
            $table->string('major');
            $table->string('place');
        });
        Schema::create('users_work', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('users_id')->index()->unsigned();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('title');
            $table->date('start_date');
            $table->date('finish_date');
            $table->string('major');
            $table->string('place');
        });
        Schema::create('user_skill', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('users_id')->index()->unsigned();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('title');
            $table->mediumText('description');
            $table->integer('score');
        });
        Schema::create('users_article', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('users_id')->index()->unsigned();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('title');
            $table->date('publish_date');
            $table->string('journal');
        });
        Schema::create('users_forums', function(Blueprint $table)
        {
            $table->integer('users_id')->index()->unsigned();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('forums_id')->index()->unsigned();
            $table->foreign('forums_id')->references('id')->on('forums')->onDelete('cascade');
        });
        Schema::create('users_connection', function(Blueprint $table)
        {
            $table->integer('followers_id')->index()->unsigned();
            $table->foreign('followers_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('followings_id')->index()->unsigned();
            $table->foreign('followings_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('connections_id')->index()->unsigned();
            $table->foreign('connections_id')->references('id')->on('connections_type')->onDelete('cascade');
        });
        Schema::create('users_activity', function(Blueprint $table)
        {
            $table->integer('types_id')->index()->unsigned();
            $table->foreign('types_id')->references('id')->on('activities_type')->onDelete('cascade');
            $table->integer('targets_id')->index()->unsigned();
            $table->foreign('targets_id')->references('id')->onDelete('cascade');
            $table->integer('users_id')->index()->unsigned();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('users_tag', function(Blueprint $table)
        {
            $table->integer('users_id')->index()->unsigned();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('tags_id')->index()->unsigned();
            $table->foreign('tags_id')->references('id')->on('tags')->onDelete('cascade');
        });


        Schema::create('connections_type', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title');
            $table->string('label');
            $table->string('description');
        });
        Schema::create('activities_type', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title');
            $table->string('label');
            $table->string('description');

        });


        Schema::create('rules', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('label');
            $table->integer('state');
        });
        Schema::create('permissions', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('label');
            $table->integer('state');
        });
        Schema::create('rules_permissions', function(Blueprint $table)
        {
            $table->integer('permissions_id')->index()->unsigned();
            $table->foreign('permissions_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->integer('rules_id')->index()->unsigned();
            $table->foreign('rules_id')->references('id')->on('rules')->onDelete('cascade');
        });
        Schema::create('rules_users', function(Blueprint $table)
        {
            $table->integer('users_id')->index()->unsigned();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('rules_id')->index()->unsigned();
            $table->foreign('rules_id')->references('id')->on('rules')->onDelete('cascade');
        });

    }


    public function down()
    {
        //
    }
}
