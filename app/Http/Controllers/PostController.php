<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Footer;
use App\Models\Image;
use App\Models\Navlink;
use App\Models\Post;
use App\Models\PostAutoValidate;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show');
        $this->middleware('isWriter')->except('show','edit','update');
        $this->middleware('isRealWriter')->only('edit','update');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts',[
            'categories'=>Category::all(),
            'tags'=>Tag::all(),
            'posts'=>Post::all(),
            'currentPage'=>'Blog Posts',
            'middlePage'=>null,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create.posts',[
            'categories'=>Category::all(),
            'tags'=>Tag::all(),
            'posts'=>Post::all(),
        ]);
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
        $paragContent =  Str::of($request->content)->replace("\r\n", "</p><p>");
        $post->content = '<p>'.$paragContent.'</p>';
        $post->validated = PostAutoValidate::first()->post_auto_validate;
        Storage::put('public/img/blog/',$request->file('src'));
        $post->src = $request->file('src')->hashName();
        $post->category_id = $request->category_id;
        $post->user_id = Auth::id();
        // many to many with tags //to test :
        $post->save();
        $post->save();
        foreach($request->tag_id as $item) {
            $post->tags()->attach($item); 
        };

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
        // for both ? et guest et auth ? Avec gate pour le edit et autres ?
        return view('blog_post',[
            'navlinks'=>Navlink::all(),
            'images'=>Image::all(),
            'post'=>$post,
            'categories'=>Category::all(),
            'tags'=>Tag::all(),
            'footers'=>Footer::first(),
            'header_current'=>Navlink::find(3)->link,
        ]);
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
        $paragContent =  Str::of($request->content)->replace("\r\n", "</p><p>");
        $post->content = '<p>'.$paragContent.'</p>';
        $post->validated = PostAutoValidate::first()->post_auto_validate;
        Storage::delete('public/img/blog/'.$post->src);
        Storage::put('public/img/blog/',$request->file('src'));
        $post->src = $request->file('src')->hashName();
        $post->category_id = $request->category_id;
        // many to many with tags //to test :
        $post->tags()->sync($request->tag_id); 
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
        // soft delete required by client ??? !!! check it out
    }

    public function search(Request $request){
        // Get the search value from the request
        $search = $request->input('search');
    
        // Search in the title and body columns from the posts table
        $posts = Post::query()
            ->where('title', 'LIKE', "%{$search}%")
            // ->orWhere('body', 'LIKE', "%{$search}%")
            // ->get()
            ->orderBy('created_at','DESC')
            ->paginate(10);
    
        // Return the search view with the resluts compacted
        return view('blog_search_results', [
            'navlinks'=>Navlink::all(),
            'images'=>Image::all(),
            'posts'=>$posts,
            'categories'=>Category::all(),
            'tags'=>Tag::all(),
            'footers'=>Footer::first(),
            'header_current'=>Navlink::find(3)->link,
        ]);
    }
}
