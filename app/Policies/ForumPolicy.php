<?php

namespace App\Policies;

use App\Contents\ForumPost;
use App\User;
use App\Contents\Forum;
use App\UserActivity;
use Illuminate\Auth\Access\HandlesAuthorization;

class ForumPolicy
{
    use HandlesAuthorization;



    public function ban(User $user, ForumPost $post)
    {
        return $post->report > '20' || $user->admin() || $user->manager();
    }


    public function create(User $user)
    {
        return $user->ban !== '1';
    }


    public function update(User $user,ForumPost $post)
    {
        return $user->id == $post->users_id;
    }


    public function delete(User $user, ForumPost $post)
    {
        return $user->id == $post->users_id || $user->admin() || $user->forumCat->pluck('id')->contains($post->forum->cat->parent_id) ;

    }


    public function admin(User $user)
    {
        return $user->admin() ;
    }


    public function manager(User $user)
    {
        return  $user->admin() || $user->manager();
    }


    public function director(User $user)
    {
        return  $user->admin() || $user->manager() || $user->director();
    }


    public function like(User $user, ForumPost $post)
    {
        return UserActivity::where('types_id', '1')->where('users_id', $user->id)->where('targets_id', $post->id)->first() !== null;
    }
}
