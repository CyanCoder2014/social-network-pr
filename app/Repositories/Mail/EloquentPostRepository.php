<?php namespace App\Repositories\Post;

use App\User;
use App\Contents\Post;

class EloquentPostRepository implements PostRepository
{
    /**
     * Get feeds posted by current user and friends.
     *
     * 	@param User $user
     *
     *	@return mixed
     */
    public function getPublishedByUserAndFriends(User $user)
    {
        $friendsUserIds = $user->friends()->lists('requester_id');

        $friendsUserIds[] = $user->id;

        return Post::whereIn('user_id', $friendsUserIds)->latest()->take(10)->get();

    }

    public function getPublishedByUser(User $user)
    {
        return $user->feeds()->paginate(8);

    }


    /**
     * Get feeds posted by current user and friends via ajax.
     *
     * 	@param User $user
     *
     * 	@param int $startingPoint
     *
     *	@return mixed
     */
    public function getPublishedByUserAndFriendsAjax(User $user, $skipQty)
    {
        $friendsUserIds = $user->friends()->lists('requester_id');

        $friendsUserIds[] = $user->id;

        return Post::whereIn('user_id', $friendsUserIds)->latest()->skip($skipQty)->take(10)->get();
    }

}