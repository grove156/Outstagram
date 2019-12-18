@extends('layouts.app')

@section('content')
<div class="container">
  <form action="/profile/{{$user->id}}/update" method="post" enctype="multipart/form-data">
      @csrf
      @method('PATCH')
      <div class="container">
          <div class="row">
            <div class="col-8 offset-2">
              <div class="row">
                <h1>Edit profile</h1>
              </div>
              <div class="form-group row">
                <label for="image" class="col-md-4 col-form-label"><strong>Post Image</strong></label>
                <input type="file" class="form-control-file" id="image" name="image">
                @error('image')

                <strong>{{ $message }}</strong>

                @enderror
              </div>
              <div class="form-group row">
                  <label for="title" class="col-md-4 col-form-label"><strong>title</strong></label>
                  <input id="title"
                         name="title"
                         type="text"
                         class="form-control @error('title') is-invalid @enderror"
                         value="{{ old('title')?? $user->profile->title  }}"
                         autocomplete="title" autofocus>
                    @error('title')

                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
              </div>
              <div class="form-group row">
                  <label for="description" class="col-md-4 col-form-label"><strong>description</strong></label>
                  <input id="description"
                         name="description"
                         type="text"
                         class="form-control @error('description') is-invalid @enderror"
                         value="{{ old('description')?? $user->profile->description }}"
                         autocomplete="description" autofocus>
                    @error('description')

                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
              </div>
              <div class="form-group row">
                  <label for="url" class="col-md-4 col-form-label"><strong>url</strong></label>
                  <input id="url"
                         name="url"
                         type="text"
                         class="form-control @error('url') is-invalid @enderror"
                         value="{{ old('url')?? $user->profile->url }}"
                         autocomplete="url" autofocus>
                    @error('url')

                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
              </div>
          <div class="form-group row pt-4">
              <button class='btn btn-primary'>Save profile</button>
          </div>
        </div>
      </div>
  </form>
</div>
@endsection
