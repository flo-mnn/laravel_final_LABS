<?php

namespace App\Http\Controllers;

use App\Models\Office;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.offices',[
            'offices'=>Office::first(),
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
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function show(Office $office)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function edit(Office $office)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Office $office)
    {
        $validate = $request->validate([
            'street'=>'required|max:500',
            'number'=>'required|max:20',
            'postcode'=>'required|max:20',
            'city'=>'required|max:255',
            'country'=>'max:255',
            'phone'=>'max:50',
            'email'=>'required|email|max:255',
        ]);
        // no need to change title here
        $office->street = $request->street;
        $office->number = $request->number;
        $office->postcode = $request->postcode;
        $office->city = $request->city;
        if($request->country){
            $office->country = $request->country;
        }
        if($request->phone){
            $office->phone = $request->phone;
        }
        $office->email = $request->email;
        $office->save();

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function destroy(Office $office)
    {
        //
    }
}
