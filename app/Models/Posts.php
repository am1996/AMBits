<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Posts extends Model
{
    use HasFactory;
    protected $table = "posts";
    protected $primaryKey = "id";
    protected $fillable = ["caption","image"];
    public $timestamps = true;

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function delete(){
        $imageBasePath = base_path() . "/public" . $this->image;
        if(File::exists($imageBasePath)){
            File::delete($imageBasePath);
        }
        parent::delete();
    }
}
