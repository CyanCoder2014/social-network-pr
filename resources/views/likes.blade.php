@foreach($usersLike as $userLike)
    @if(! empty($userLike->user->username))

        <div style="display: inline-block; margin-bottom: 20px;margin-left: 20px;border: 1px solid #e0e2e5;padding: 6px;border-radius: 3px">
                        <span><img style="height: 30px;width: 30px; border: solid 1px #5e5e5e ; border-radius: 50%"
                                   @if($userLike->user->profile == null)
                                   src="<?= Url('/images/3-sm.jpg'); ?>"
                                   @else
                                   src="<?= Url('/user-img/'.$userLike->user->profile->image_b); ?>"
                                   @endif
                                   alt=""/></span>
        <span href="<?= Url('home/profile/show/137-'.$userLike->user->id.'-42-'.$userLike->user->username); ?>" title="{{$userLike->user->name.' '.$userLike->user->family}}"><a
                    target="_blank" href="<?= Url('home/profile/show/137-'.$userLike->user->id.'-42-'.$userLike->user->username); ?>"
                    style="color: #242424">&nbsp; {{$userLike->user->username}}  </a></span>
    </div>
    @endif
@endforeach