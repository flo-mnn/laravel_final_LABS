<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
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
        return view('admin.testimonials',[
            'testimonials'=>Testimonial::all(),
            'currentPage'=> 'Testimonials',
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
        return view('admin.create.testimonials');
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
            'name'=>'required|max:255',
            'job_title'=>'required|max:255',
            'src'=>'required|image|max:6000',
            'text'=>'required|max:1000',
        ]);

        $testimonial = new Testimonial();
        $testimonial->name = $request->name;
        $testimonial->job_title = $request->job_title;
        Storage::put('public/img/testimonial/', $request->file('src'));
        $testimonial->src = $request->file('src')->hashName();
        $testimonial->text = $request->text;
        $testimonial->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        return view('admin.edit.testimonials', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $validate = $request->validate([
            'name'=>'required|max:255',
            'job_title'=>'required|max:255',
            'src'=>'required|image|max:6000',
            'text'=>'required|max:1000',
        ]);

        $testimonial->name = $request->name;
        $testimonial->job_title = $request->job_title;
        Storage::delete('public/img/testimonial/'.$testimonial->src);
        Storage::put('public/img/testimonial/', $request->file('src'));
        $testimonial->src = $request->file('src')->hashName();
        $testimonial->text = $request->text;
        $testimonial->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        // for dev purpose
        // Storage::delete('public/img/testimonial/'.$testimonial->src);
        $testimonial->delete();

        return redirect()->route('testimonials.index');
    }
}
