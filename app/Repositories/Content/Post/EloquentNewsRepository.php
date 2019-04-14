<?php namespace App\Repositories\Content;

use App\Contents\PostComment;
use App\User;
use App\Contents\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Jobs\Post\CreatePostJob;
use Illuminate\Support\Facades\Input;


class EloquentNewsRepository implements ContentRepository
{

    public function __construct()
    {
        $this->user = Auth::id();
        $this->post = new Post;
    }



    public function getMainByUserIds($userId)
    {
        $user = new User();
        $userIds = $user->connectionsIds($userId);
        $userIds[] = $userId;

        return Post::whereIn('users_id', $userIds)->orderby('id', 'desc')->paginate(4);
    }



    public function getEndById($postId)
    {
        return Post::where('id', $postId)->first();
    }



    public function getMoreComments($postId, $commentsId)
    {
        return PostComment::where('parent_id', '0')->where('post_id', $postId)->orderby('id', 'desc')->paginate(7);
    }



    public function findByIds(array $ids)
    {

    }



    public function createByUserId(Request $request, $user)
    {
        $content = new Post();

        if ($request->image == null) {
            $content->image = 'null';
        }else{
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('post-images'), $imageName);
            $FileName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $content->image = $FileName;
        }

        if ($request->image_b == null) {
            $content->image_b = 'file';
        }else{
            $imageName = time() . '.' . $request->image_b->getClientOriginalExtension();
            $request->image_b->move(public_path('post-files'), $imageName);
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

        if ($request->news == null) {
                $content->news = '0';
        }else {$content->news = $request->news; };

        $content->state = $request->state;

        $content->users_id = $user;


        $post = CreatePostJob::dispatch($content);

        return $post;
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
        $content = new PostComment($request->all());
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