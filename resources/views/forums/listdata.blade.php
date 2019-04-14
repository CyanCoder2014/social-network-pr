
@foreach($cat->forums()->paginate(12) as $forum)
    <tr>
        <td><span><img style="border-radius: 5px; height: 50px" src="<?= Url('forum-images/'. $forum->image) ?>" alt=""/></span></td>
        <td ><a   href="<?= Url('home/forum/show/'. $forum->id) ?>"> {{$forum->title}}</a></td>
        <td> {!!  to_jalali($forum->created_at) !!}<br> توسط: {{$forum->user->username}} </td>
        <td>
            @if($forum->group_id != '0' && $forum->group_id != null)
            {{$forum->group->title}}
            @endif

        </td>
        <td>تعداد پست: {!!  $forum->postNumber($forum->id) !!}<br> تعداد کاربران: {{$forum->userNumber($forum->id)}} </td>

        <td> {!!  until_time($forum->created_at) !!} </td>
        @if(Auth::check())
            @if(Auth::user()->can('admin', \App\Contents\Post::class) || Auth::user()->forumCat->pluck('id')->contains($cat->parent_id))
                <td><a onclick="return confirm('آیا از حذف این تالار مطمئن هستید؟');"  href="<?= Url('/home/forum/destroy/'.$forum->id ); ?>"><i class="fa fa-remove"></i> </a></td>
            @endif
        @endif
    </tr>
@endforeach
