@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 100px">
        @forelse($all_posts as $post)
            <div class="my-1 border p-3">
                <a href="{{route('posts.show',$post->id)}}" class="text-decoration-none h4">{{$post->title}}</a>
                <p class="text-muted">{{$post->user->name}}</p>
                <p class="mt-2">
                    {{$post->body}}
                </p>
                {{-- if its your own post--}}
                @if ($post->user->id === Auth::user()->id)
                    <div class="mt-2 text-end">
                        <a href="{{route('posts.edit',$post->id)}}" class="btn btn-warning">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <form action="{{route('posts.delete',$post->id)}}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </div>
                @endif
            </div> {{-- this is how input the comment --}}






        @empty
            <h2 class="text-muted text-center">
                No posts yet
            </h2>
            <div class="text-center">
                <a href="{{route('posts.create')}}" class="text-decoration-none">Create new posts</a>
            </div>
        @endif
    </div>



    </div>










    </div>




@endsection
