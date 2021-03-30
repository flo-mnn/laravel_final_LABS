<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostAutoValidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.post',[
            'posts'=>Post::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //add view
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title'=>'required|max:500',
            'content'=>'required',
            'src'=>'required|image',
            'category_id'=>'required',
        ]);
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->validated = PostAutoValidate::first()->post_auto_validate;
        Storage::put('public/img/blog/',$request->file('src'));
        $post->src = $request->file('src')->hashName();
        $post->category_id = $request->category_id;
        $post->user_id = Auth::id();
        // many to many with tags
            // to do when checked the one with user working
        $post->save();

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //to add view;
        // for both ? et guest et auth ? Avec gate pour le edit et autres ?
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.edit.posts', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validate = $request->validate([
            'title'=>'required|unique:posts|max:500',
            'content'=>'required',
            'src'=>'required|image',
            'category_id'=>'required',
        ]);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->validated = PostAutoValidate::first()->post_auto_validate;
        Storage::delete('public/img/blog/'.$post->src);
        Storage::put('public/img/blog/',$request->file('src'));
        $post->src = $request->file('src')->hashName();
        $post->category_id = $request->category_id;
        // many to many with tags
            // to do when checked the one with user working
        $post->save();

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Storage::delete('public/img/blog/'.$post->src);
        $post->delete();
        // check if deleting in pivot table (onDelete('cascade')??) check
    }
}
