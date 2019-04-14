@extends('layouts.layout')

@section('content')




    <div class="row" >


        <div class="main-content-area">
            <div class="mail-area">
                <div class="row">
                    <div class="col-md-12">
                        <div class="all-mail">

                            <h3>صندوق پیام ها و اعلانات</h3><br>
                            <div class="mail-head">
                                <div class="search-emails">
                                    <div id="inboxMail"></div>
                                </div>
                                <form>






                                </form>
                            </div><!-- mail head -->
                            <ul class="your-emails" id="inbox-mail-list">

@foreach($notifications as $notification)
                                <li class="email unread


">
                                    <div class="star-email">
                                        <i class="ti-trash"></i>
                                    </div>

                                    <a id="{{$notification->id}}" style="margin-right: 30px;color: #1b6d85"  title="" class="inbox-msg"><span class="blue-bg">عنوان</span>{!! \Illuminate\Support\Str::words($notification->data['title'] , $words = 5, $end = '...')    !!}       </a>
                                    <a id="{{$notification->id}}" style="margin-right: 40px"  target="_blank"
                                       @if($notification->data['message'] !== '0')
                                       href="<?= Url('home/profile/show/137-'.\App\User::find($notification->notifiable_id)->id.'-42-'.\App\User::find($notification->notifiable_id)->username.'/'.$notification->id); ?>"
                                       @else
                                       href="#"
                                       @endif
                                       title="" class="inbox-msg"><span class="green-bg">پیام</span>{!! \Illuminate\Support\Str::words($notification->data['message'] , $words = 7, $end = '...')    !!}   </a>
                                    <a id="{{$notification->id}}" style="margin-right: 20px;color: #8eb4cb" target="_blank" href="<?= Url('home/profile/show/137-'.\App\User::find($notification->data['sender'])->id.'-42-'.\App\User::find($notification->data['sender'])->username); ?>" title="{{\App\User::find($notification->data['sender'])->name.' '.\App\User::find($notification->data['sender'])->family}}" class="inbox-msg"><span class="red-bg">ارسال کننده</span> {{\App\User::find($notification->data['sender'])->username}}   </a>

                                    <span style="margin-right: 40px" >{!! until_time($notification->created_at) !!}</span>
                                </li>

@endforeach


                            </ul>


                        </div><!-- All Emails -->
                    </div>
                </div>
                <!-- Modal -->
            </div><!-- Mail Area -->
        </div>



          </div>



    @foreach($notifications as $notification)

        <div id="read-email-{{$notification->id}}" class="read-email
@if($notification->id === $notificationId)
                reading
@endif">
        <div class="read-email-sec">
            <a   title="" class="close-reading"><i class="ti-close"></i></a>
            <div class="read-email-head">
                <h3 class="mail-user"><a style="color: #8eb4cb" target="_blank" href="<?= Url('home/profile/show/137-'.\App\User::find($notification->data['sender'])->id.'-42-'.\App\User::find($notification->data['sender'])->username); ?>"  title="{{\App\User::find($notification->data['sender'])->name.' '.\App\User::find($notification->data['sender'])->family}}"> {{\App\User::find($notification->data['sender'])->username}}</a><span><img style="width: 100%;height: 100%" src="<?= Url('/user-img/'.\App\User::find($notification->data['sender'])->profile->image_b); ?>" alt="" /></span></h3>
            </div><!-- Read Email Head -->
            <div class="message-container">
                <h4>{!!$notification->data['title']  !!}</h4>
            {!! $notification->data['message']  !!}

            <!--
                <div class="quick-reply">
                    <div id="wrapper">
                        <textarea placeholder="..."></textarea>
                    </div>
                    <a class="blue-bg send-mail" title=""  >ارسال </a>
                </div>
                -->
            </div>
        </div>
    </div>
    @endforeach

@endsection