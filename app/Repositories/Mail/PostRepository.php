<?php

namespace App\Repositories\post;

use App\User;


interface PostRepository
{
    public function getPublishedByUserAndFriends(User $user);

    public function getPublishedByUser(User $user);

    public function getPublishedByUserAndFriendsAjax(User $user, $skipQty);
}