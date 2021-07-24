<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Posts::orderBy("created_at","desc")->paginate(10);
        return view("posts.index",[
            "posts"=> $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("posts.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * goes to /posts/
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            "caption"=>"required",
            "image"=> ["required","image"]
        ]);
        $imagePath = "/storage/" . request("image")->store("uploads","public");
        auth()->user()->posts()->create([
            "caption"=> $data["caption"],
            "image" => $imagePath
        ]);
        return redirect("/posts");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Posts::find($id);
        return view("posts.details",[
            "post"=> $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Posts::findOrFail($id);
        return view("posts.edit",[
            "post" => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Posts::findOrFail($id);
        if($post->user_id == Auth::user()->id){
            $post->caption = $request->caption;
            $post->save();
            return redirect("/posts/" . $post->id);
        }else{
            return abort(401, 'Unauthorized action.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Posts::findOrFail($id);
        if($post->user_id == Auth::user()->id){
            $post->delete();
            return redirect("/posts");
        }else{
            return abort(401, 'Unauthorized action.');
        }        
    }
}
