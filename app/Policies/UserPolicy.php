<?php

namespace App\Policies;

use App\User;
use App\Contents\Post;
use App\UserActivity;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy extends Policy
{
    use HandlesAuthorization;



    public function ban(User $user, Post $post)
    {
        return $post->report > '20' || $user->admin() || $user->manager();
    }


    public function create(User $user)
    {
        return $user->ban !== '1';
    }


    public function edit(User $user, User $profileId)
    {
        return $user->id == $profileId->id;
    }



    public function follow(User $user, User $profileId)
    {
        return UserActivity::where('types_id', '10')->where('users_id', $user->id)->where('targets_id', $profileId->id)->first() == null;
    }




    public function update(User $user,Post $post)
    {
        return $user->id == $post->users_id;
    }


    public function delete(User $user, Post $post)
    {
        return $user->id == $post->users_id || $user->admin();
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

    public function justDirector(User $user)
    {
        return  $user->director();
    }

    public function justManager(User $user)
    {
        return  $user->manager();
    }
}
