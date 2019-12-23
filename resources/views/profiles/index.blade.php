@extends('layouts.app')

@section('content')
<div class="container">
      <div class="row">
          <div class="col-3 pl-5">
            <img src="{{$user->profile->profileImage()}}" style="height:200px; width:200px" class="rounded-circle">
          </div>
        <div class="col-9">
            <div class="d-flex justify-content-between align-items-baseline">
              <div class="d-flex align-items-center pb-4">
                <div class="h3">{{$user->username}}</div>
                <follow-button user-id="{{$user->id}}" follows="{{$follows}}"></follow-button>
                <!--<button class="btn btn-primary ml-3">Follow</button>-->
              </div>
              @can('update', $user->profile)
                <a class="btn btn-primary" href='/p/create/{{$user->id}}'>Add new posts</a>
              @endcan
            </div>
            <div class="d-flex">
                  <div class="pr-5"><strong>{{$user->posts->count()}}</strong> post</div>
                  <div class="pr-5"><strong>{{$user->profile->followers->count()}}</strong> followers</div>
                  <div class="pr-5"><strong>{{$user->following->count()}}</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{$user->profile->title}}</div>
            <div>{{$user->profile->description}}</div>
            <div class="pb-3"><a href="#">{{$user->profile->url ?? 'N/A'}}</div>
            @can ('update', $user->profile)
              <a href="/profile/{{$user->id}}/edit" style="border-color: gray;" class="btn btn-light form-control"><strong>Edit profile</strong></a>
            @endcan
        </div>
    </div>
    <hr>
    <div class="row pt-4">
        @foreach($user->posts as $post)
        <div class="col-4 pb-4">
            <a href="/p/{{$post->id}}">
              <img class="w-100" src="/storage/{{$post->image}}">
            </a>
        </div>
        @endforeach

    </div>
</div>
@endsection
