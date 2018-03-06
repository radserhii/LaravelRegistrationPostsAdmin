<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts', ['posts' => $posts]);
    }

    public function addPost(Request $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->text = $request->text;
        $post->is_published = ($request->is_published) ? 1 : 0;
        $post->user_id = Auth::user()->id;
        $msg = ($post->save()) ? "Post saved successfully" : "Post didn't save";
        return redirect('home')->with('status', $msg);
    }
    public function deletePost($id)
    {
        Post::destroy($id);
        return redirect('posts');
    }

    public function showUpdatePost($id)
    {
        $post = Post::find($id);
        return view ('update-post', ['post' => $post]);
    }

    public function updatePost(Request $request)
    {
        $post = Post::find($request->id);
        $post->title = $request->title;
        $post->text = $request->text;
        $post->is_published = ($request->is_published) ? 1 : 0;
        $msg = ($post->save()) ? "Post updated successfully" : "Post didn't update";
        return redirect('posts')->with('status', $msg);
    }
}
