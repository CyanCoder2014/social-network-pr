<?php

namespace App\Providers;

use App\Http\Controllers\Forum1Controller;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Repositories\Content\ContentRepository;
use App\Repositories\Content\EloquentForumRepository;
use App\Repositories\Content\EloquentPostRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

//        $this->app->bind(
//            'App\Repositories\Content\ContentRepository',
//            'App\Repositories\Content\EloquentPostRepository'
//        );


        $this->app->when(HomeController::class)
            ->needs(ContentRepository::class)
            ->give(EloquentPostRepository::class);


        $this->app->when(PostController::class)
            ->needs(ContentRepository::class)
            ->give(EloquentPostRepository::class);


        $this->app->when(ForumController::class)
            ->needs(ContentRepository::class)
            ->give(EloquentForumRepository::class);


        $this->app->when(Forum1Controller::class)
            ->needs(ContentRepository::class)
            ->give(EloquentForumRepository::class);

//        $this->app->when(PostController::class)
//            ->needs(ContentRepository::class)
//            ->give();

    }
}
