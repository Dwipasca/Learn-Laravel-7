<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index(){
    
        // $posts =  Post::get(['title']); //mengambil title saja dari table post
        // $posts =  Post::take(5)->get(); // hanya mengambil 5 data saja
        
        // $posts =  Post::paginate(5); 
        // $posts =  Post::simplePaginate(5); 
        $posts =  Post::latest()->paginate(4); 
        
        // $posts =  Post::get(); 
        return view('posts.index', ['posts' => $posts]);
    
    }
    public function show($slug){
        
        // return view('posts.show', compact('post'));

        $post = Post::where('slug', $slug)->firstOrFail();
        return view('posts.show', compact('post'));
       
    }

    public function create() {
        return view('posts.create');
    }

    public function store(Request $request){

        $post = new Post;
        $post->title = $request->title;
        $post->slug = \Str::slug($request->title);
        $post->body = $request->body;
        $post->save();

        // return back();
        return redirect()->to('posts');
        
    }

}
