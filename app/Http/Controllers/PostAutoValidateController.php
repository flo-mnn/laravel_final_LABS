<?php

namespace App\Http\Controllers;

use App\Models\PostAutoValidate;
use Illuminate\Http\Request;

class PostAutoValidateController extends Controller
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
        //
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
     * @param  \App\Models\PostAutoValidate  $postAutoValidate
     * @return \Illuminate\Http\Response
     */
    public function show(PostAutoValidate $postAutoValidate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PostAutoValidate  $postAutoValidate
     * @return \Illuminate\Http\Response
     */
    public function edit(PostAutoValidate $postAutoValidate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PostAutoValidate  $postAutoValidate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostAutoValidate $postAutoValidate)
    {
        $postAutoValidate->post_auto_validate = $request->post_auto_validate;
        $postAutoValidate->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PostAutoValidate  $postAutoValidate
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostAutoValidate $postAutoValidate)
    {
        //
    }
}
