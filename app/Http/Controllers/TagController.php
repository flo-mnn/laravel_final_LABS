<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Footer;
use App\Models\Image;
use App\Models\Navlink;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isWebmaster')->except('show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.tag',[
            'tags'=>Tag::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'tag'=>'required|max:255'
        ]);

        $tag = new Tag();
        $tag->tag = $request->tag;
        $tag->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        $posts_ps = [];
        foreach ($tag->posts->sortByDesc('created_at') as $post) {
            $post_ps = preg_split('/\r\n|\r|\n/', $post->content);
            array_push($posts_ps, $post_ps);
        };
        $posts = $tag->posts()
                    ->orderBy('created_at','DESC')
                    ->paginate(3);
        $images = Image::all();
        $navlinks = Navlink::all();
        $header_current = 'Blog';
        $categories = Category::all();
        $tags = Tag::all();
        $footers = Footer::first();
        return view('blog_per_category',compact('posts','posts_ps','images','navlinks','header_current','categories','tags','footers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('admin.edit.tags',compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $validate = $request->validate([
            'tag'=>'required|max:255'
        ]);

        $tag->tag = $request->tag;
        $tag->save();

        return redirect()->route('admin.blog');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.blog');
    }
}
