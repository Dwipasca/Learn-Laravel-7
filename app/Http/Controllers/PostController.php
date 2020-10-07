<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index(){
    
        // $posts =  Post::get(['title']); //mengambil title saja dari table post
        // $posts =  Post::take(5)->get(); // hanya mengambil 5 data saja
        
        // $posts =  Post::paginate(5); // paginate with show 5 data
        // $posts =  Post::simplePaginate(5);  //paginate show data but the view is different
        $posts =  Post::latest()->paginate(6); // show 4 data the last input 
        
        // $posts =  Post::get(); //show all table Post data
        return view('posts.index', ['posts' => $posts]);
    
    }
    public function show(Post $post){ // option 1 change parameter with $slug and delete Post $post 

        // option 1 show data detail 
        // $post = Post::where('slug', $slug)->firstOrFail();
        // return view('posts.show', compact('post'));

        //option 2 show data detail
       return view('posts.show', compact('post'));
    }

    public function create() {
        // show form input to create post
        return view('posts.create');
    }

    public function store(Request $request){

        // validate form field
        // $this->validate($request, [
        //     'title' => 'required|min:3',
        //     'body' => 'required'
        // ]);
        
        // create post option 1
        // $post = new Post;
        // $post->title = $request->title;
        // $post->slug = \Str::slug($request->title);
        // $post->body = $request->body;
        // $post->save();

        // create post option 2
        // Post::create([
        //     'title' => $request->title,
        //     'slug'  => \Str::slug($request->title),
        //     'body'  => $request->body,
        // ]);

        // =========================================================

        $fields = $request->validate([
            'title' => 'required|min:3',
            'body' => 'required'
        ]);

        $fields['slug'] = \Str::slug($request->title);
        Post::create($fields);

        //create session for success create data
        session()->flash('success', 'The post was created');

        // after create we back to where?
        return redirect()->to('posts'); // redirect to view posts
        // return back(); //back to form input
        
    }

    public function edit(Post $post) {
        return view('posts.edit', compact('post'));
    }

    public function update(Post $post) {

        $fields = request()->validate([
            'title' => 'required|min:3',
            'body' => 'required'
        ]);

        $post->update($fields);

        session()->flash('success', 'The post was updated');

        return redirect()->to('posts');

    }

}
