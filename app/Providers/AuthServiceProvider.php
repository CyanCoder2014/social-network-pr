<?php

namespace App\Providers;

use App\Contents\File;
use App\Contents\ForumPost;
use App\Contents\PostComment;
use App\Policies\FilePolicy;
use App\Policies\ForumPolicy;
use App\Policies\PostCommentPolicy;
use App\Policies\UserPolicy;
use App\User;
use App\Contents\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Policies\PostPolicy;
use Symfony\Component\Yaml\Tests\A;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
//        'App\Contents\Post' => 'App\Policies\PostPolicy',
        'App\Model' => 'App\Policies\ModelPolicy',

        Post::class => PostPolicy::class,
        ForumPost::class => ForumPolicy::class,
        User::class => UserPolicy::class,
        File::class => FilePolicy::class,
        PostComment::class => PostCommentPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */


    public function boot()
    {
        $this->registerPolicies();



        Gate::resource('Post',PostPolicy::class );

//        });
//        Gate::define('post', function ($post){
//            return true;
//        });
//        Gate::resource('post', PostPolicy::class );


//
//        if (Gate::forUser($user)->allows('update-post', $post)) {
//            // The user can update the post...
//        }
//
//        if (Gate::forUser($user)->denies('update-post', $post)) {
//            // The user can't update the post...
//        }
    }

}