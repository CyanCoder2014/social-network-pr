<?php

namespace App\Repositories\Content;

use App\User;
use Illuminate\Http\Request;


interface ContentRepository
{
    public function getMainByUserIds($userId);

    public function getEndById($postId);

    public function getMoreComments($postId, $commentsId);

    public function findByIds(array $ids);

    public function createByUserId(Request $request, $user);

    public function updateByUserId($id, User $user);

    public function deleteByUserId($id, User $user);

    public function likeByUserId($id, User $user);

    public function commentByUserId(Request $request, $postId, $user);

    public function shareByUserId($id, User $user);

    public function banByUserId($id, User $user);

    public function reportByUserId($id, User $user);

}