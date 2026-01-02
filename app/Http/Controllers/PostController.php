<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        $postsFromDB = Post::all();
        return view('posts.index', ['posts' => $postsFromDB]);
    }

    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

  public function create()
  {
    $users = User::all();

    return view('posts.create', ['users' => $users]);
  }

  public function store()
  {
    // Validation data before store
    request()->validate([
      'title' => ['required', 'min: 3'],
      'description' => ['required', 'min: 10'],
      'post_creator' => ['required', 'exists:users,id']
    ]);

    // 1-get the user data
    $title = request()->title;
    $description = request()->description;
    $postCreator = request()->post_creator;

    // 2-store the user data in db
    Post::create([
      'title' => $title,
      'description' => $description,
      'user_id' => $postCreator
    ]);

    // 3-rediriction to posts.index
    return to_route('posts.index');
  }

  public function edit(Post $post)
  {
    $users = User::all();

    return view('posts.edit', ['users' => $users], ['post' => $post]);
  }

  public function update($postId)
  {
    // Validation data before update
    request()->validate([
      'title' => ['required', 'min: 3'],
      'description' => ['required', 'min: 10'],
      'post_creator' => ['required', 'exists:users,id']
    ]);

    //1- get the user data
    $title = request()->title;
    $description = request()->description;
    $postCreator = request()->post_creator;

    //2- update the user data in database
    $singlePostFromDB = Post::find($postId);
    $singlePostFromDB->update([
      'title' => $title,
      'description' => $description,
      'user_id' => $postCreator
    ]);

    //3- redirection to posts.show
    return to_route('posts.show', $postId);
  }

  public function destroy($postId)
  {
    $post = Post::find($postId);
    $post->delete();

    return to_route('posts.index');
  }
}
