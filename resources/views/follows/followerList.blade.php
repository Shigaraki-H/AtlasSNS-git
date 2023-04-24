@extends('layouts.login')

@section('content')

<div class="post_container">
<div class ="page_title">Follower Lists</div>

@foreach($userLists as $userPics)

    @if(Auth::user()->isFollowed($userPics->id))
    
        @if(Auth::user()->id == $userPics->id)
            @continue
        @else
        <div id ="{{$userPics->id}}" class="follows_list_images">
            <a href="{{ route('users.otherProfile', ['id'=>$userPics->id]) }}"><img src="{{ asset('../images/'.$userPics->images) }}" width="90px" height="90px"></a>
        </div>
        @endif

    @else

    @endif

@endforeach
</div>



<div class = "postlists">



    @foreach($postLists as $postLists)
        @if(Auth::user()->isFollowed($postLists->user->id))
        
        <div class="other_contents">
                    @if(Auth::user()->id == $postLists->user->id)
                        @continue
                    @else
                    <div class="post_other_img">
                        <a href="{{ route('users.otherProfile', ['id'=>$postLists->user->id]) }}"><img src="{{ asset('../images/'.$postLists->user->images) }}" width="90px" height="90px"></a>
                        <div class ="name_status">
                            <p class ="user_block">{{$postLists->user->username}}</p>
                            <p class ="post_block">{{$postLists->post}}</p>
                        </div>
                            <p class ="created_block">{{$postLists->created_at}}</p>
                    </div>
        </div>
                    @endif
                    
        @else
        @endif
    @endforeach
</div>


@endsection

