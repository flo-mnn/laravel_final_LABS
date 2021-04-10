<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Navlink;
use App\Models\Title;
use Illuminate\Http\Request;

class TitleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isWebmaster');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.titles',[
            'titles'=>Title::all(),
            'currentPage'=>"Navigation & Titles",
            'middlePage'=>null,
            'navlinks'=>Navlink::all(),
            'images'=>Image::all(),
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Title  $title
     * @return \Illuminate\Http\Response
     */
    public function show(Title $title)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Title  $title
     * @return \Illuminate\Http\Response
     */
    public function edit(Title $title)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Title  $title
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Title $title)
    {
        $validate = $request->validate([
            'title'=>'required|max:500'
        ]);
        $title->title = $request->title;
        $title->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Title  $title
     * @return \Illuminate\Http\Response
     */
    public function destroy(Title $title)
    {
        //
    }

    public function newsletter(Request $request)
    {
        $validate = $request->validate([
            'title'=>'required|max:500',
            'subtitle'=>'required|max:500'
        ]);
        $title = Title::find(8);
        $title->title = $request->title;
        $title->save();

        $subtitle = Title::find(9);
        $subtitle->title = $request->subtitle;
        $subtitle->save();

        return redirect()->back();
    }

}
