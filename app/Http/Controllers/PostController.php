<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Expr\FuncCall;

use App\Http\Requests\SavePostRequest;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $posts = Post::get();
        return view('posts.index', ['gatito' => $posts]);
    }

    public function show($id)
    {
        $postDetalle = Post::findOrFail($id);
        return view('posts.show', ['post'=>$postDetalle]);
    }

    public function create()
    {
        return view('posts.create', ['post'=> new Post]); 
    }

    public function edit(Post $post)
    {
        return view('posts.edit', ['post' =>$post]);
    }

    public function store(SavePostRequest $request)
    {
       Post::create($request->validated());
       return to_route('posts.index', )->with('status', 'Superheroe POSTEADO');    
    }

    public function update(SavePostRequest $request, Post $post)
    {
      $post->update($request->validated());
       return to_route('posts.show', $post)->with('status', 'Superheroe actualizado');    
    }

    public function destroy(Post $post)
    {
        $post -> delete();
        return to_route('posts.index')->with('status', 'Eliminado correctamente');
    }
}
