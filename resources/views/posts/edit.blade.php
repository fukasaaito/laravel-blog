@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-8">
            <form action="{{route('posts.update',$post->id)}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label fw-bold">Title</label>
                    <input type="text" name="title" id="title" value="{{$post->title}}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label fw-bold">Body</label>
                    <textarea name="body" id="body" rows="3" class="form-control">
                    {{$post->body}}
                    </textarea>
                </div>
                <div class="mb-3">
                    <img src="{{asset('storage/image/'.$post->image)}}" class="img-thumbnail d-block" alt="">
                    <label for="image" class="form-label fw-bold">Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                    <div class="form-text">
                        Acceptable formats: jpeg, gif, png, jpg <br>
                        Maximum file size: 1024 MB
                    </div>
                </div>
                <button type="submit" class="btn btn-primary px-5">Post</button>
            </form>
        </div>
    </div>
@endsection
