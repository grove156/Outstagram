@extends('layouts.app')

@section('content')
<div class="container">
      <div class="row">
          <div class="col-3 pl-5">
            <img src="https://instagram.fmel5-1.fna.fbcdn.net/v/t51.2885-19/s150x150/51279173_701532740243702_8505887665474764800_n.jpg?_nc_ht=instagram.fmel5-1.fna.fbcdn.net&oh=3a91bcb5983b37acc06e193fb91e9df0&oe=5E741D42" class="rounded-circle">
          </div>
        <div class="col-9">
            <div class="d-flex justify-content-between align-items-baseline">
              <h1>{{$user->username}}</h1>
              <a class="btn btn-primary" href='/p/create/{{$user->id}}'>Add new posts</a>
            </div>
            <div class="d-flex">
                  <div class="pr-5"><strong>{{$user->posts->count()}}</strong> post</div>
                  <div class="pr-5"><strong>730k</strong> followers</div>
                  <div class="pr-5"><strong>212</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{$user->profile->title}}</div>
            <div>{{$user->profile->description}}</div>
            <div class="pb-3"><a href="#">{{$user->profile->url ?? 'N/A'}}</div>

            <a href="/profile/{{$user->id}}/edit" style="border-color: gray;" class="btn btn-light form-control"><strong>Edit profile</strong></a>
        </div>
    </div>
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
