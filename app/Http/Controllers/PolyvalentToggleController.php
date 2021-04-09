<?php

namespace App\Http\Controllers;

use App\Models\PolyvalentToggle;
use Illuminate\Http\Request;

class PolyvalentToggleController extends Controller
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
     * @param  \App\Models\PolyvalentToggle  $polyvalentToggle
     * @return \Illuminate\Http\Response
     */
    public function show(PolyvalentToggle $polyvalentToggle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PolyvalentToggle  $polyvalentToggle
     * @return \Illuminate\Http\Response
     */
    public function edit(PolyvalentToggle $polyvalentToggle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PolyvalentToggle  $polyvalentToggle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PolyvalentToggle $polyvalentToggle)
    {
        $polyvalentToggle = PolyvalentToggle::find(1);
        if ($request->toggle) {
            $polyvalentToggle->toggle = true;
        } else {
            $polyvalentToggle->toggle = false;
        }
        $polyvalentToggle->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PolyvalentToggle  $polyvalentToggle
     * @return \Illuminate\Http\Response
     */
    public function destroy(PolyvalentToggle $polyvalentToggle)
    {
        //
    }
}
