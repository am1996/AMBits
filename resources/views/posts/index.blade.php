@extends("layouts.app")

@section("content")
    @if(count($posts) > 0)
        <div class="card-columns mt-4">
            @foreach($posts as $post)
                <div class="card">
                    <img style="width:100%" class="card-img-top img-fluid" src="{{$post["image"]}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-text">{{$post["caption"]}}</h5>
                        <small class="text-muted">{{$post["created_at"]}}</small>
                        <hr>
                        <a href="/posts/{{$post['id']}}" class="btn btn-block btn-primary">Details</a>
                    </div>
                </div>
            @endforeach
            <!-- paginator -->
            @if ($posts->lastPage() > 1)
                <ul class="pagination">
                    <li class="{{ ($posts->currentPage() == 1) ? ' disabled' : '' }} page-item">
                        <a class="page-link" href="{{ $posts->url(1) }}">Previous</a>
                    </li>
                @for ($i = 1; $i <= $posts->lastPage(); $i++)
                    <li class="{{ ($posts->currentPage() == $i) ? ' active' : '' }} page-item">
                        <a class="page-link" href="{{ $posts->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor
                    <li class="{{ ($posts->currentPage() == $posts->lastPage()) ? ' disabled' : '' }} page-item">
                        <a class="page-link" href="{{ $posts->url($posts->currentPage()+1) }}" >Next</a>
                    </li>
                </ul>
            @endif
            <!-- paginator end -->
            </div>
        </div>
    @else
        <h1 class="text-center mt-5">No Posts Here</h1>
    @endif
@endsection