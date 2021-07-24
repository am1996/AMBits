@extends("layouts.app")

@section("content")
<style>
.float{
	position:fixed;
	width:60px;
	height:60px;
	bottom:40px;
	right:40px;
	background-color:#38c172;
	color:#FFF;
	border-radius:50px;
	text-align:center;
    line-height:60px;
	box-shadow: 2px 2px 3px #999;
}

.my-float{
	margin-top:22px;
}
p{margin:0.5rem !important}
@media (max-width: 768px) {
    .centered-sm{
        text-align: center;
    }
}
</style>
<div class="row mt-4">
    <div class="col-md-4 col-sm-12 text-center">
        <img src="/img/blank_profile.png" class="rounded-circle" width="200" alt="blank"/>
    </div>
    <div class="col-md-8 col-sm-12 centered-sm mt-2">
        <a class="btn btn-outline-success float-right" href="/profile/edit">
            <i class="fa fa-cog fa-lg"></i>
        </a>
        <h2>{{Auth::user()->name}}</h2>
        <p class="text-muted font-weight-bold">#{{Auth::user()->username}}</p>
        <p>{{Auth::user()->profile->description ?? "N/A"}}</p>
        <p><a href="{{Auth::user()->profile->url ?? ""}}" target="blank">{{Auth::user()->profile->url ?? "N/A"}}</a></p>
    </div>
</div>
<hr>
<div class="row">
    <h3 class="col-11">Posts</h3>
</div>
<div class="card-columns">
    @if(count(Auth::user()->posts) > 0)
        @foreach(Auth::user()->posts as $post)
            <a class="card" target="blank" href="/posts/{{$post["id"]}}">
                <img style="width:100%" src="{{$post["image"]}}" alt="image"/>
            </a>
        @endforeach
    @else
        <span class="glyphicon glyphicon-info-sign"></span>
        <h3 class="text-center col-12">No Posts</h3>
    @endif
</div>

<a href="/posts/create" class="float">
    <i class="fa fa-plus"></i>
</a>
@endsection