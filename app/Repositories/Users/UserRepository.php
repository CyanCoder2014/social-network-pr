<?php

namespace App\Repositories\post;

use App\User;


interface UserRepository
{
    public function getPublishedByUserAndFriends(User $user);

    public function getPublishedByUser(User $user);

    public function getPublishedByUserAndFriendsAjax(User $user, $skipQty);
}