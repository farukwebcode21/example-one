<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function add(Request $request){
        $request->validate([
            'title'=>'required',
            'content'=>'required',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->date = now();
        $post->content = $request->content;
        $post->save();

        return redirect()->route('dashboard');
    }
    
    public function index(){
        return view('posts');
    }

}
