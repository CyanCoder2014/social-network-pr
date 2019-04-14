<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeContentTables extends Migration
{
    public function up()
    {

                Schema::create('posts', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('users_id')->index()->unsigned();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('cat_id')->index()->unsigned();
            $table->foreign('cat_id')->references('id')->on('posts_cat')->onDelete('cascade');
            $table->string('title');
            $table->string('image');
            $table->string('image_b');
            $table->mediumText('intro');
            $table->text('text');
            $table->integer('view');
            $table->integer('like');
            $table->integer('comment');
            $table->integer('ban');
            $table->integer('state');
            $table->integer('news');
            $table->integer('content');
            $table->timestamps();
        });
        Schema::create('posts_cat', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title');
            $table->string('image');
            $table->integer('parent_id')->references('id')->on('posts_cat')->onDelete('cascade');
            $table->integer('state');
        });
        Schema::create('posts_tags', function(Blueprint $table)
        {
            $table->integer('tags_id')->index()->unsigned();
            $table->foreign('tags_id')->references('id')->on('tags')->onDelete('cascade');
            $table->integer('posts_id')->index()->unsigned();
            $table->foreign('posts_id')->references('id')->on('posts')->onDelete('cascade');
        });


        Schema::create('courses', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('users_id')->index()->unsigned();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('cat_id')->index()->unsigned();
            $table->foreign('cat_id')->references('id')->on('courses_cat')->onDelete('cascade');
            $table->string('title');
            $table->string('image');
            $table->string('image_b');
            $table->mediumText('intro');
            $table->text('text');
            $table->integer('view');
            $table->integer('like');
            $table->integer('comment');
            $table->integer('ban');
            $table->integer('state');
            $table->timestamps();
        });
        Schema::create('courses_tags', function(Blueprint $table)
        {
            $table->integer('tags_id')->index()->unsigned();
            $table->foreign('tags_id')->references('id')->on('tags')->onDelete('cascade');
            $table->integer('courses_id')->index()->unsigned();
            $table->foreign('courses_id')->references('id')->on('courses')->onDelete('cascade');
        });
        Schema::create('courses_cat', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title');
            $table->string('image');
            $table->integer('parent_id')->references('id')->on('posts_cat')->onDelete('cascade');
            $table->integer('state');
        });
        Schema::create('courses_pod', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('courses_id')->index()->unsigned();
            $table->foreign('courses_id')->references('id')->on('courses')->onDelete('cascade');
            $table->string('title');
            $table->string('link');
            $table->string('author');
            $table->string('other');
            $table->string('image');
            $table->timestamps();
        });
        Schema::create('courses_slide', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('courses_id')->index()->unsigned();
            $table->foreign('courses_id')->references('id')->on('courses')->onDelete('cascade');
            $table->string('title');
            $table->string('image');
            $table->string('link');
            $table->mediumText('description');
            $table->integer('order');
            $table->string('effect');
            $table->timestamps();
        });


        Schema::create('forums', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('users_id')->index()->unsigned();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('cat_id')->index()->unsigned();
            $table->foreign('cat_id')->references('id')->on('forums_cat')->onDelete('cascade');
            $table->string('title');
            $table->string('image');
            $table->string('image_b');
            $table->text('text');
            $table->integer('view');
            $table->integer('like');
            $table->integer('comment');
            $table->integer('ban');
            $table->integer('state');
            $table->timestamps();
        });
        Schema::create('forums_cat', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title');
            $table->string('image');
            $table->integer('parent_id')->references('id')->on('forums_cat')->onDelete('cascade');
            $table->integer('state');
        });
        Schema::create('forums_posts', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('users_id')->index()->unsigned();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('forums_id')->index()->unsigned();
            $table->foreign('forums_id')->references('id')->on('forums')->onDelete('cascade');
            $table->string('title');
            $table->string('image');
            $table->string('image_b');
            $table->mediumText('intro');
            $table->text('text');
            $table->integer('view');
            $table->integer('like');
            $table->integer('comment');
            $table->integer('ban');
            $table->integer('state');
            $table->timestamps();
        });
        Schema::create('forums_tags', function(Blueprint $table)
        {
            $table->integer('tags_id')->index()->unsigned();
            $table->foreign('tags_id')->references('id')->on('tags')->onDelete('cascade');
            $table->integer('forums_id')->index()->unsigned();
            $table->foreign('forums_id')->references('id')->on('forum')->onDelete('cascade');
        });



        Schema::create('events', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('users_id')->index()->unsigned();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('cat_id')->index()->unsigned();
            $table->foreign('cat_id')->references('id')->on('events_cat')->onDelete('cascade');
            $table->string('title');
            $table->string('place');
            $table->date('start_date');
            $table->time('start_time');
            $table->date('finish_date');
            $table->time('finish_time');
            $table->string('image');
            $table->string('image_b');
            $table->mediumText('description');
            $table->integer('view');
            $table->integer('like');
            $table->integer('comment');
            $table->integer('ban');
            $table->integer('state');
            $table->timestamps();
        });
        Schema::create('events_cat', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title');
            $table->string('image');
            $table->integer('parent_id')->references('id')->on('events_cat')->onDelete('cascade');
            $table->integer('state');
        });
        Schema::create('events_tag', function(Blueprint $table)
        {
            $table->integer('tags_id')->index()->unsigned();
            $table->foreign('tags_id')->references('id')->on('tags')->onDelete('cascade');
            $table->integer('events_id')->index()->unsigned();
            $table->foreign('events_id')->references('id')->on('events')->onDelete('cascade');
        });


        Schema::create('files', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('users_id')->index()->unsigned();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('cat_id')->index()->unsigned();
            $table->foreign('cat_id')->references('id')->on('files_cat')->onDelete('cascade');
            $table->string('title');
            $table->string('type');
            $table->string('link');
            $table->string('image');
            $table->string('image_b');
            $table->mediumText('description');
            $table->integer('view');
            $table->integer('like');
            $table->integer('comment');
            $table->integer('ban');
            $table->integer('state');
            $table->timestamps();
        });
        Schema::create('files_cat', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title');
            $table->string('image');
            $table->integer('parent_id')->references('id')->on('files_cat')->onDelete('cascade');
            $table->integer('state');
        });
        Schema::create('files_tag', function(Blueprint $table)
        {
            $table->integer('tags_id')->index()->unsigned();
            $table->foreign('tags_id')->references('id')->on('tags')->onDelete('cascade');
            $table->integer('files_id')->index()->unsigned();
            $table->foreign('files_id')->references('id')->on('files')->onDelete('cascade');
        });




        Schema::create('tags', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('users_id')->index()->unsigned();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('title');
            $table->mediumText('intro');
            $table->text('text');
            $table->integer('view');
            $table->timestamps();
        });



        Schema::create('post_comments', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('users_id')->index()->unsigned();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('post_id')->index()->unsigned();
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->integer('parent_id')->references('id')->on('comments')->onDelete('cascade');
            $table->mediumText('comment');
            $table->integer('approved');
            $table->integer('ban');
            $table->integer('like');
            $table->integer('view');
            $table->timestamps();
        });
        Schema::create('forum_comments', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('users_id')->index()->unsigned();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('post_forum_id')->index()->unsigned();
            $table->foreign('post_forum_id')->references('id')->on('forums_posts')->onDelete('cascade');
            $table->integer('parent_id')->references('id')->on('comments')->onDelete('cascade');
            $table->mediumText('comment');
            $table->integer('approved');
            $table->integer('ban');
            $table->integer('like');
            $table->integer('view');
            $table->timestamps();
        });
        Schema::create('course_comments', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('users_id')->index()->unsigned();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('course_id')->index()->unsigned();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->integer('parent_id')->references('id')->on('comments')->onDelete('cascade');
            $table->mediumText('comment');
            $table->integer('approved');
            $table->integer('ban');
            $table->integer('like');
            $table->integer('view');
            $table->timestamps();
        });
        Schema::create('file_comments', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('users_id')->index()->unsigned();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('file_id')->index()->unsigned();
            $table->foreign('file_id')->references('id')->on('files')->onDelete('cascade');
            $table->integer('parent_id')->references('id')->on('comments')->onDelete('cascade');
            $table->mediumText('comment');
            $table->integer('approved');
            $table->integer('ban');
            $table->integer('like');
            $table->integer('view');
            $table->timestamps();
        });
        Schema::create('event_comments', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('users_id')->index()->unsigned();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('event_id')->index()->unsigned();
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->integer('parent_id')->references('id')->on('comments')->onDelete('cascade');
            $table->mediumText('comment');
            $table->integer('approved');
            $table->integer('ban');
            $table->integer('like');
            $table->integer('view');
            $table->timestamps();
        });

    }


    public function down()
    {
        //
    }
}
