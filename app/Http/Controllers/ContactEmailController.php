<?php

namespace App\Http\Controllers;

use App\Models\ContactEmail;
use Illuminate\Http\Request;

class ContactEmailController extends Controller
{
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
     * @param  \App\Models\ContactEmail  $contactEmail
     * @return \Illuminate\Http\Response
     */
    public function show(ContactEmail $contactEmail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContactEmail  $contactEmail
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactEmail $contactEmail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ContactEmail  $contactEmail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContactEmail $contactEmail)
    {
        $contactEmail->email = $request->email;
        $contactEmail->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContactEmail  $contactEmail
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactEmail $contactEmail)
    {
        //
    }
}
