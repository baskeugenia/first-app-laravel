<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{

    public function delete(Post $post) {
        if (auth()->user()->id === $post->user_id) {
            $post->delete();
        }

        return redirect('/');
    }
    public function edit(Post $post, Request $request) {
        if (auth()->user()->id != $post->user_id) {
            return redirect('/');
        }

        $input = $request->validate([
            'title' => ['required'],
            'body' => ['required'],
        ]);
        $input['title'] = strip_tags($input['title']);
        $input['body'] = strip_tags($input['body']);

        $post->update($input);
        return redirect('/');
    }
    public function showEdit(Post $post) {
        if (auth()->user()->id() != $post->user_id) {
            return redirect('/');
        }
        return view('edit-post', ['post'=> $post]);
    }
    public function createPost(Request $request) {
        $input = $request->validate([
            'title' => ['required'],
            'body' => ['required'],
        ]);

        $input['title'] = strip_tags($input['title']);
        $input['body'] = strip_tags($input['body']);
        $input['user_id'] = auth()->user()->id;

        Post::create($input);

        return redirect('/');
    }
}
