<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\Title;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarouselController extends Controller
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
        return view('admin.carousels',[
            'carousels'=>Carousel::all(),
            'currentPage'=>"Slider Images",
            'middlePage'=>null,
            'titles'=>Title::first(),
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
            'src'=> 'required|image'
        ]);

        $carousel = new Carousel();
        Storage::put('public/img/carousel/',$request->file('src'));
        $carousel->src = $request->file('src')->hashName();
        $carousel->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function show(Carousel $carousel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function edit(Carousel $carousel)
    {
        return view('admin.edit.carousels',compact('carousel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carousel $carousel)
    {
        $validate = $request->validate([
            'src'=> 'required|image'
        ]);

        // Storage::delete('public/img/carousel/'.$carousel->src);
        Storage::put('public/img/carousel/',$request->file('src'));
        $carousel->src = $request->file('src')->hashName();
        $carousel->save();

        return redirect()->route('carousels.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carousel $carousel)
    {
        // Storage::delete('public/img/carousel/'.$carousel->src);
        $carousel->delete();

        return redirect()->route('carousels.index');
    }
}
