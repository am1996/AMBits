@extends("layouts.app")

@section("content")
    <div class="card my-4">
        <div class="card-body">
            <h1 class="card-title">{{$post->title}}</h1>
            <img class="card-img-top" src="{{$post["image"]}}" alt="Card image cap">
            <hr>
            <p>{{$post->caption}}</p>
            @if(Auth::user()->id == $post->user_id)
                <div class="btn-group" role="group" aria-label="Basic example">
                    <form action="/posts/{{$post["id"]}}/edit" method="GET">
                        @csrf
                        <input type="submit" class="btn btn-success" value="Edit Caption">
                    </form>
                    &nbsp;
                    <form action="/posts/{{$post["id"]}}" method="POST">
                        @csrf
                        @method("delete")
                        <input type="submit" class="btn btn-danger" value="Delete Post">
                    </form>
                </div>
            @endif
        </div>
    </div>
    <a class="btn" href="/posts">⬅ Go Back</a>
@endsection