@extends("layouts.app")

@section("content")
    <h1 class="pt-4 offset-3">Edit Caption</h1>
    <form class="col-md-6 offset-md-3" method="post" action="/posts/{{$post->id}}">
        @csrf
        @method("patch")
        <div class="form-group">
            <label for="caption">Caption</label>
            <input class="form-control @error('caption') is-invalid @enderror" 
            name="caption" 
            value="{{ $post->caption ?? old('caption') }}" required 
            autocomplete="caption" autofocus>
            @error('caption')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <input value="Edit Caption" type="submit" class="btn btn-block btn-success"/>
    </form>
@endsection