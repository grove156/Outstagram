@extends('layouts.app')

@section('content')
<form action="/p" method="post" enctype="multipart/form-data">
    @csrf
    <div class="container">
        <div class="row">
          <div class="col-8 offset-2">
            <div class="row">
              <h1>Add new post</h1>
            </div>
            <div class="form-group row">
                <label for="caption" class="col-md-4 col-form-label"><strong>Post caption</strong></label>
                <input id="caption"
                       name="caption"
                       type="text"
                       class="form-control @error('caption') is-invalid @enderror"
                       value="{{ old('caption') }}"
                       autocomplete="caption" autofocus>
                  @error('caption')

                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
            </div>
        <div class="form-group row">
            <label for="image" class="col-md-4 col-form-label"><strong>Post Image</strong></label>
            <input type="file" class="form-control-file" id="image" name="image">
            @error('image')

                <strong>{{ $message }}</strong>
  
            @enderror
        </div>
        <div class="form-group row pt-4">
            <button class='btn btn-primary'>Add new Post</button>
        </div>
      </div>
    </div>
</form>
@endsection
