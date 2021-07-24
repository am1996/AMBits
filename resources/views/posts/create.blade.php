@extends("layouts.app")

@section("content")
    <h1 class="pt-4 offset-3">Add New Post</h1>
    <form enctype="multipart/form-data" class="col-md-6 offset-md-3" method="post" action="/posts/">
        @csrf
        <div class="form-group">
            <label for="caption">Caption</label>
            <input class="form-control @error('caption') is-invalid @enderror" 
            name="caption" 
            value="{{ old('caption') }}" required 
            autocomplete="caption" autofocus>
            @error('caption')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="image">Uploaded Photo</label>
            <input name="image" 
            type="file"
            accept="image/*"
            class="form-control-file" id="image">
            @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <input value="Add New Photo" type="submit" class="btn btn-block btn-success"/>
    </form>
@endsection