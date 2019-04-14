<?php

namespace App\Jobs\Post;

use App\Contents\ForumPost;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CreateForumPostJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $content;
    public $intro;
    public $users_id;
    public $image;
    public $image_b;
    public $text;
    public $title;
    public $news;
    public $state;

    public function __construct($content)
    {
        $this->title = $content->title;
        $this->intro = $content->intro;
        $this->users_id = $content->users_id;
        $this->image = $content->image;
        $this->image_b = $content->image_b;
        $this->text = $content->text;
        $this->news = $content->news;
        $this->state = $content->state;
    }



    public function handle()
    {
        $feed = ForumPost::publish($this->title, $this->intro,$this->text,$this->image,$this->image_b, $this->users_id , $this->news, $this->state);

        $feed->save();

        return true;
    }
}
