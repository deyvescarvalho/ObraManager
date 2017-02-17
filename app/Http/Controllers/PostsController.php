<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

class PostsController extends Controller
{
  private $post;

  public function __construct(Post $post)
  {
    $this->post = $post;
  }

public function auth()
{
  # code...
  $user = \App\User::find(1);
  Auth::login($user);
}

    public function index()
    {
      $posts = $this->post->paginate(5);

      return view('posts.index', compact('posts'));
    }


    public function create($request)
    {

    }

    public function store(PostRequest $request)

    {

        // $request->title = str_replace([""], "/", $request->title);
        $this->post->create($request->all());
        return redirect()->route('blog.index');
    }

    public function edit($id)
    {
      # code...
      $post = $this->post->find($id);

      return view('posts.edit', compact('post'));
    }

    public function update($id, PostRequest $request)
    {
      # code...
      $this->post->find($id)->update($request->all());
      return redirect()->route('blog.index');
    }

    public function destroy($id)
    {
      # code...

      $this->post->find($id)->delete();
      return redirect()->route('blog.index');
    }
}
