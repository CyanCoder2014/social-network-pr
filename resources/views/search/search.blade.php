<div class="notification drop-list active">
    <ul>
    @foreach($users as $user)
            <li>
                <a target="_blank" href="<?= Url('home/profile/show/137-'.$user->id.'-42-'.$user->username); ?>" title=""><span><i class="ti-user blue-bg"></i></span> {{$user->username}} <i>{{$user->name.' '.$user->family}}</i>
                    <h6></h6></a>
            </li>
        @endforeach

        @foreach($forumCats as $forumCat)
            <li>
                <a target="_blank" href="<?= Url('home/forum/list/'.$forumCat->id); ?>" title=""><span><i class="ti-pencil red-bg"></i></span> دسته تالار <i>{{$forumCat->title}}</i>
                    <h6></h6></a>
            </li>
        @endforeach
        @foreach($forums as $forum)
            <li>
                <a target="_blank" href="<?= Url('home/forum/show/'.$forum->id); ?>" title=""><span><i class="ti-pencil green-bg"></i></span> تالار <i>{{$forumCat->title}}</i>
                    <h6></h6></a>
            </li>
        @endforeach

    </ul>
</div>

