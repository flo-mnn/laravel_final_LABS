<?php

namespace App\Http\Controllers;

use App\Models\CommentUser;
use Illuminate\Http\Request;

class CommentUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.comment_users',[
            'comment_users'=>CommentUser::all(),
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
     * @param  \App\Models\CommentUser  $commentUser
     * @return \Illuminate\Http\Response
     */
    public function show(CommentUser $commentUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CommentUser  $commentUser
     * @return \Illuminate\Http\Response
     */
    public function edit(CommentUser $commentUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CommentUser  $commentUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CommentUser $commentUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CommentUser  $commentUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(CommentUser $commentUser)
    {
        //
    }
}
