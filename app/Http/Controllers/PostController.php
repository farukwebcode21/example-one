<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Notifications\PostCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



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
       
        $user = Auth::user();
        $user->notify(new PostCreated($post));

        flash()->addSuccess('Data has been saved successfully!');
        return redirect()->route('dashboard');
    }
    
    public function index(){
        return view('posts');
    }
    
    // public function edit($id){
    //     $post = Post::find($id);
    //     return view('post.edit-post')->with('post', $post);
    // }
    public function editPost($id){
      
        // $post= Post::where('id','=', $id)->first();
        // return view('edit-post', compact('post'));
        $post =Post::find($id);
        if(empty($post)){
            flash()->addError('An error has occurred please try again later.');
            return redirect()->route('dashboard');
        }
       
        return view('edit-post',[
            'post'=>$post
        ]);

    }
    public function update($id, Request $request){
        $post = Post::findOrFail($id);

        $request->validate([
            'title' =>'required',
            'content' =>'required',
        ]);

        $post->title = $request->title;
        $post->content= $request->content;
        $post->save();

        // $flasher->addSuccess('post update successfully');
        flash()->addSuccess('Data has been Update successfully!');
        return redirect()->route(('dashboard'));
    }
    public function delete($id){
        $post = Post::findOrFail($id);
        $post->delete();
        flash()->addSuccess('Post has been Delete successfully!');
        return redirect()->route('dashboard');

    }
   
}
