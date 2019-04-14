<?php namespace App\Repositories\Content;

use App\Contents\ForumComment;
use App\Contents\ForumPost;
use App\Contents\PostComment;
use App\Jobs\Post\CreateForumPostJob;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Jobs\Post\CreatePostJob;
use Illuminate\Support\Facades\Input;


class EloquentForumRepository implements ContentRepository
{

    public function __construct()
    {
        $this->user = Auth::id();
        $this->post = new ForumPost;
    }



    public function getMainByUserIds($userId)
    {
        $user = new User();
        $userIds = $user->connectionsIds($userId);
        $userIds[] = $userId;

        //return ForumPost::whereIn('users_id', $userIds)->orderby('id', 'desc')->paginate(15);
        return ForumPost::orderby('id', 'desc')->paginate(15);
    }



    public function getEndById($postId)
    {
        return ForumPost::where('id', $postId)->first();
    }



    public function getMoreComments($postId, $commentsId)
    {
        return ForumComment::where('parent_id', '0')->where('post_forum_id', $postId)->orderby('id', 'desc')->paginate(7);
    }



    public function findByIds(array $ids)
    {

    }



    public function createByUserId(Request $request, $user)
    {
        $content = new ForumPost;

        if ($request->image == null) {
            $content->image = 'null';
        }else{
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('forum-images'), $imageName);
            $FileName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $content->image = $FileName;
        }

        if ($request->image_b == null) {
            $content->image_b = 'file';
        }else{
            $imageName = time() . '.' . $request->image_b->getClientOriginalExtension();
            $request->image_b->move(public_path('forum-files'), $imageName);
            $FileName = time() . '.' . $request->file('image_b')->getClientOriginalExtension();
            $content->image_b = $FileName;
        }

        if ($request->title == null) {
            $content->title = 'null';
        }else {$content->title = $request->title; };

        $content->intro = $request->intro;

        if ($request->text == null) {
            $content->text = 'null';
        }else {$content->text = $request->text; };


        $content->state = $request->state;
        $content->parent_id = $request->parent_id;
        $content->forums_id = $request->forums_id;

        $content->users_id = $user;


        //$content1 = new ForumPost($request->all());
        $content->save();

        //$post = CreateForumPostJob::dispatch($content);

        return $content;
    }



    public function updateByUserId($id, User $user)
    {

    }


    public function deleteByUserId($id, User $user)
    {

    }


    public function likeByUserId($id, User $user)
    {

    }


    public function commentByUserId(Request $request, $postId, $user)
    {
        $content = new ForumComment($request->all());
        $content->users_id= $user;
        $content->save();

        return $content;
    }


    public function shareByUserId($id, User $user)
    {

    }


    public function banByUserId($id, User $user)
    {

    }


    public function reportByUserId($id, User $user)
    {

    }




//
//
//
//
//
//
//
//    public function getAll()
//    {
//        return $this->model->all();
//    }
//
//    public function getById($id)
//    {
//        return $this->model->find($id);
//    }
//
//
//    public function create(array $attributes)
//    {
//        return $this->model->create($attributes);
//    }
//
//    public function update($id, array $attributes)
//    {
//        return $this->model->find($id)->update($attributes);
//    }
//
//
//    public function delete($id)
//    {
//        return $this->model->find($id)->delete();
//    }
//
//
//


    public function create(Post $post)
    {
        $this->em->persist($post);
        $this->em->flush();
    }

    public function update(Post $post, $data)
    {
        $post->setTitle($data['title']);
        $post->setBody($data['body']);
        $this->em->persist($post);
        $this->em->flush();
    }

    public function PostOfId($id)
    {
        return $this->em->getRepository($this->class)->findOneBy([
            'id' => $id
        ]);
    }

    public function delete(Post $post)
    {
        $this->em->remove($post);
        $this->em->flush();
    }

    /**
     * create Content
     * @return Post
     */
    private function perpareData($data)
    {
        return new Post($data);
    }

}