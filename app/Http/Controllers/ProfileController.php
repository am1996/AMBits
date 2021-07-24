<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
    function index(){
        return view("profile.index");
    }
    function edit(Request $req){
        return view("profile.edit");
    }
    function update(Request $req){
        $uid = Auth::id();
        $user = User::findOrFail($uid);
        $key=null;
        if(isset($req->name)){
            $key = "Fullname";
            $user->name = $req->name;
            $req->validate([
                "name"=> ["required","string","max:255","min:5"]
            ]);
        }else if(isset($req->username)){
            $key = "Username";
            $user->username = $req->username;
            $req->validate([
                "username"=> ["required","string","max:255","min:5"]
            ]);
        }else if(isset($req->email)){
            $key = "Email";
            $user->email = $req->email;
            $req->validate([
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            ]);
        }else if(isset($req->description)){
            $key = "Description";
            $user->profile->description = $req->description;
            $req->validate([
                'description' => ['required', 'string', 'max:7500'],
            ]);
        }else if(isset($req->url)){
            Validator::extend('german_url', function($attribute, $value, $parameters)  {
                $url = str_replace(["ä","ö","ü"], ["ae", "oe", "ue"], $value);
                return filter_var($url, FILTER_VALIDATE_URL);
            });
            $key = "Url";
            $user->profile->url = $req->url;
            $req->validate([
                "url" => ["required","german_url","max:1000"],
            ]);
        }else if(isset($req->password)){
            $key="Password";
            $user->password = Hash::make($req->password);
            $req->validate([
                'password' => ["min:8","required_with:retypepassword","same:retypepassword",],
                'retypepassword' => ['min:8']
            ]);
        }
        
        $user->push();
        $req->session()->flash("success",$key." was set successfully.");

        return redirect("/profile/edit");
    }
}
