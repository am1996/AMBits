@extends("layouts.app")

@section("content")
    <h1 class="my-4 offset-md-2">Edit: </h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul style="margin:0px !important">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @elseif(Session::has("success"))
        <div class="alert alert-success">{{ Session::get("success") }}</div>
    @endif
    <div>
        <div class="accordion col-md-8 col-sm-12 offset-md-2" id="accordion1" >
            <!-- fullname field -->
            <div class="card">
                <div class="card-header container" id="headingOne">
                    <div class="row">
                        <p class="col-10" style="line-height:37px;margin:0px;"><strong>Fullname:</strong>
                         {{Auth::user()->name}}</p>
                        <button class="btn btn-success col-2" type="button" data-toggle="collapse" data-target="#collapseName" aria-expanded="true" aria-controls="collapseOne">
                            Edit
                        </button>
                    </div>
                </div>
                <div id="collapseName" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion1">
                    <div class="card-body">
                        <form method="post" action="/profile/edit">
                            @csrf
                            @method("PATCH")

                            <div class="form-group">
                                <label for="fullname">Fullname:</label>
                                <input value="{{ Auth::user()->name ?? "" }}" type="text" class="form-control" id="fullname" name="name" placeholder="Enter fullname">
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- username field -->
            <div class="card">
                <div class="card-header container" id="headingOne">
                    <div class="row">
                        <p class="col-10" style="line-height:37px;margin:0px;"><strong>Username:</strong> {{Auth::user()->username}}</p>
                        <button class="btn btn-success col-2" type="button" data-toggle="collapse" data-target="#collapseUsername" aria-expanded="true" aria-controls="collapseOne">
                            Edit
                        </button>
                    </div>
                </div>
                <div id="collapseUsername" class="collapse" data-parent="#accordion1">
                    <div class="card-body">
                        <form method="post" action="/profile/edit">
                            @csrf
                            @method("PATCH")

                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input value="{{ Auth::user()->username }}" type="text" class="form-control" id="username" name="username" placeholder="Enter Username">
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- email field -->
            <div class="card">
                <div class="card-header container" id="headingOne">
                    <div class="row">
                        <p class="col-10" style="line-height:37px;margin:0px;"><strong>Email:</strong> {{Auth::user()->email}}</p>
                        <button class="btn btn-success col-2" type="button" data-toggle="collapse" data-target="#collapseEmail" aria-expanded="true" aria-controls="collapseOne">
                            Edit
                        </button>
                    </div>
                </div>
                <div id="collapseEmail" class="collapse" data-parent="#accordion1">
                    <div class="card-body">
                        <form method="post" action="/profile/edit">
                            @csrf
                            @method("PATCH")

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input value="{{ Auth::user()->email }}" type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- username field -->
            <div class="card">
                <div class="card-header container" id="headingOne">
                    <div class="row">
                        <p class="col-10" style="line-height:37px;margin:0px;"><strong>Description:</strong> {{\Illuminate\Support\Str::limit(Auth::user()->profile->description, $limit = 70, $end = '...') ?? "N/A"}}</p>
                        <button class="btn btn-success col-2" type="button" data-toggle="collapse" data-target="#collapseDescription" aria-expanded="true" aria-controls="collapseDescription">
                            Edit
                        </button>
                    </div>
                </div>
                <div id="collapseDescription" class="collapse" data-parent="#accordion1">
                    <div class="card-body">
                        <form method="post" action="/profile/edit">
                            @csrf
                            @method("PATCH")

                            <div class="form-group">
                                <label for="Description">Description:</label>
                                <textarea maxlength="7500" type="text" rows="5" class="form-control" id="Description" name="Description" placeholder="Enter Description">{{Auth::user()->profile->description ?? "N/A"}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- username field -->
            <div class="card">
                <div class="card-header container" id="headingOne">
                    <div class="row">
                        <p class="col-10" style="line-height:37px;margin:0px;"><strong>Url:</strong> {{Auth::user()->profile->url ?? "N/A"}}</p>
                        <button class="btn btn-success col-2" type="button" data-toggle="collapse" data-target="#collapseUrl" aria-expanded="true" aria-controls="collapseOne">
                            Edit
                        </button>
                    </div>
                </div>
                <div id="collapseUrl" class="collapse" data-parent="#accordion1">
                    <div class="card-body">
                        <form method="post" action="/profile/edit">
                            @csrf
                            @method("PATCH")

                            <div class="form-group">
                                <label for="Url">Url:</label>
                                <input value="{{ Auth::user()->profile->url ?? "" }}" type="text" class="form-control" id="Url" name="Url" placeholder="Enter Url">
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- password field -->
            <div class="card">
                <div class="card-header container" id="headingOne">
                    <div class="row">
                        <p class="col-10" style="line-height:37px;margin:0px;"><strong>Password:</strong> *****************</p>
                        <button class="btn btn-success col-2" type="button" data-toggle="collapse" data-target="#collapsePassword" aria-expanded="true" aria-controls="collapseOne">
                            Edit
                        </button>
                    </div>
                </div>
                <div id="collapsePassword" class="collapse" data-parent="#accordion1">
                    <div class="card-body">
                        <form method="post" action="/profile/edit">
                            @csrf
                            @method("PATCH")

                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="Password" class="form-control" id="Password" name="password" placeholder="Enter Password">
                            </div>
                            <div class="form-group">
                                <label for="retypepassword">Retype Password:</label>
                                <input type="password" class="form-control" id="retypepassword" name="retypepassword" placeholder="Retype Password">
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="mb-5"></div>
@endsection