<?php

namespace App\Http\Controllers;

use App\Models\Navlink;
use Illuminate\Http\Request;

class NavlinkController extends Controller
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
        return view('admin.navlinks',[
            'navlinks'=>Navlink::all(),
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
     * @param  \App\Models\Navlink  $navlink
     * @return \Illuminate\Http\Response
     */
    public function show(Navlink $navlink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Navlink  $navlink
     * @return \Illuminate\Http\Response
     */
    public function edit(Navlink $navlink)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Navlink  $navlink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Navlink $navlink)
    {
        
        $validate = $request->validate([
            'link'=>'required|max:255'
        ]);
        $navlink->link = $request->link;
        $navlink->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Navlink  $navlink
     * @return \Illuminate\Http\Response
     */
    public function destroy(Navlink $navlink)
    {
        //
    }
}
