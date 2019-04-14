<?php

namespace App\Policies;

use App\Contents\File;
use App\User;
use App\UserActivity;
use Illuminate\Auth\Access\HandlesAuthorization;

class FilePolicy extends Policy
{
    use HandlesAuthorization;



    public function ban(User $user, File $file)
    {
        return $file->report > '20' || $user->admin() || $user->manager();
    }


    public function create(User $user)
    {
        return $user->ban !== '1';
    }



    public function update(User $user,File $file)
    {
        return $user->id == $file->users_id;
    }


    public function delete(User $user, File $file)
    {
        return $user->id == $file->users_id || $user->admin();
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


    public function like(User $user, File $file)
    {
        return UserActivity::where('types_id', '1')->where('users_id', $user->id)->where('targets_id', $file->id)->first() !== null;
    }

}
