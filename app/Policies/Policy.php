<?php

namespace App\Policies;

use App\User;
use App\Contents\Post;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class Policy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the post.
     *
     * @param  \App\User $user
     * @param  \App\Post $post
     * @return mixed
     */

    public function __construct(Post $post)
    {
        $this->userId = Auth::user();
        $this->post_userId = $post->users_id;

    }


}
