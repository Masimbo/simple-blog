<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */

    public function __construct(){

    $this->middleware('auth')->except(['index','show']);
   
}

    public function index()
    {
        $posts = Post::all();
        return view('posts.index', ['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'title'=>'required',
            'body'=>'required',
        ]);

        $post = new Post();
        $post->title= $validated_data['title'];
        $post->body= $validated_data['body'];
        $post->user_id = Auth::id(); 
        $post->save();
        return redirect()->route('post.show', $post->id);        

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', ['post'=>$post]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit' , ['post'=>$post]);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        if(Auth::id() == $post->user->id){
            $validated_data = $request->validate([
                'title'=>'required',
                'body'=>'required',
            ]);
    
            $post->title= $validated_data['title'];
            $post->body= $validated_data['body'];
            $post->user_id = Auth::id(); 
            $post->save();
        }
        else{
            return "Not Authorized";
        }
        return redirect()->route('post.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('post.index', $post->id);
    }
}
