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

        // flash()->addSuccess('Dara has been saved successfully');

        $post = new Post();
        $post->title = $request->title;
        $post->date = now();
        $post->content = $request->content;
        $post->save();

        flash()->addSuccess('Data has been saved successfully!');

        return redirect()->route('dashboard');
    }
    
    public function index(){
        return view('posts');
    }
    
    public function edit($id){
        $post = Post::find($id);
        dd($post);

        return view('edit-post',[
            'post' =>$post,
        ]);
    }

}
