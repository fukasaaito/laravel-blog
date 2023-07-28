@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-5">
            <div class="card">
                <div class="card-header">
                    <img src="{{asset('storage/image/'.$post->image)}}" alt="" class="card-img-top">
                    {{-- use asset to call in public --}}
                </div>
                <div class="card-body">
                    <p class="text-muted">
                        {{$post->title}}
                    </p>
                    <p class="fw-bold">
                        {{$post->body}}
                    </p>
                </div>
                <div class="card-footer">
                    <form action="{{route('comments.store',$post->id)}}" method="post">
                        @csrf
                        <div class="input-group">
                            <textarea name="body" id="" rows="1" class="form-control">

                            </textarea>
                            <button type="submit" class="btn btn-secondary">
                                <i class="fa-solid fa-paper-plane"></i>
                            </button>
                        </div>
                    </form>



                </div>
            </div>
            <div class="card mt-2">
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($post->comments as $comment)
                        <li class="border-0 p-3 list-group-item">
                            <p class="text-muted">
                                {{$comment->user->name}} &nbsp; <span class="fw-bold">{{$comment->body}}</span>
                            </p>
                            <p class="p-0 m-0 text-m">
                                <form action="{{route('comments.delete',$comment->id)}}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    @if($comment->user->id === Auth::user()->id)
                                        <button type="submit" class="btn p-0 text-danger">delete</button>
                                        &middot; <span class="text-muted">{{$comment->created_at->diffForHumans()}}</span>
                                    @endif
                                </form>
                            </p>
                        </li>
                        @endforeach
                    </ul>




                    @forelse($all_comments as $comment)
                        <div class="my-1 border p-3">
                                <p class="text-muted">{{$comment->body}}</p>
                                @if ($comment->user->id === Auth::user()->id)
                                    <div class="mt-2 text-end">
                                        <a href="#" class="btn btn-warning">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <form action="{{route('comments.delete',$comment->id)}}" method="post" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                @endif
                        </div>
                    @empty
                        <h6 class="text-muted text-center">
                            No comments yet
                        </h6>
                    @endif

                </div>
            </div>
        </div>
    </div>


@endsection
