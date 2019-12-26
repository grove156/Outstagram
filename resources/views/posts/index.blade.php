@extends('layouts.app')

@section('content')
<div class='container'>
    @foreach($posts as $post)
    <div class="row">
      <div class="col-8 offset-2 pt-2 pb-4" style="border-color:black;">
          <a href="/profile/{{$post->user->id}}">
            <img class="w-100" src="/storage/{{$post->image}}">
          </a>
      </div>
      <div class="col-8 offset-2 pt-2 pb-4" style="border-color:black;">
          <div class="d-flex align-items-center">
            <div class="pr-3">
                <img src="{{$post->user->profile->profileImage()}}" class="w-100 rounded-circle" style="max-width:40px;">
            </div>
            <div>
              <div class="font-weight-bold">
                <a href="profile/{{$post->user->id}}">
                  <span class="text-dark">{{$post->user->username}}</span>
                </a>
                <a href="#" class="pl-3">Follow</a>
              </div>
            </div>
          </div>

          <p>
            <span class="font-weight-bold">
            <a href="profile/{{$post->user->id}}">
              <span class="text-dark">{{$post->user->username}}</span>
            </a>
          </span> {{$post->caption}}
          </p>
      </div>
      <hr/>
    </div>
    @endforeach

    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{$posts->links()}}
        </div>
    </div>
</div>
@endsection
