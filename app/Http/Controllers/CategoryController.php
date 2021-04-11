<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Footer;
use App\Models\Navlink;
use App\Models\Picture;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show');
        $this->middleware('isWebmaster')->except('show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.categories',[
            'categories'=>Category::all(),
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
            'category'=>'required|max:255'
        ]);

        $category = new Category();
        $category->category = $request->category;
        $category->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $posts = $category->posts()
                    ->orderBy('created_at','DESC')
                    ->where('validated',1)
                    ->paginate(3);
        $images = Picture::all();
        $navlinks = Navlink::all();
        $header_current = 'Blog';
        $categories = Category::all();
        $category_active = $category;
        $tags = Tag::all();
        $footers = Footer::first();
        return view('blog_per_category',compact('posts','images','navlinks','header_current','categories','tags','footers','category_active'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.edit.categories',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $validate = $request->validate([
            'category'=>'required|max:255'
        ]);

        $category->category = $request->category;
        $category->save();

        return redirect()->route('admin.blog');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        // associated posts ? Null?
        foreach (Post::where('category_id',$category->id)->get() as $post) {
            $post->category_id = null;
            $post->save();
        };
        $category->delete();

        return redirect()->route('admin.blog');
    }
}
