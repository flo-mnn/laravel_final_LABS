<?php

namespace App\Http\Controllers;

use App\Models\JobTitle;
use App\Models\User;
use Illuminate\Http\Request;

class JobTitleController extends Controller
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
        return view('admin.job_titles',[
            'job_titles'=>JobTitle::all(),
            'currentPage'=>'Job Titles',
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
            'job_title'=>'required|max:255'
        ]);

        $job_title = new JobTitle();
        $job_title = $request->job_title;
        $job_title->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobTitle  $jobTitle
     * @return \Illuminate\Http\Response
     */
    public function show(JobTitle $jobTitle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobTitle  $jobTitle
     * @return \Illuminate\Http\Response
     */
    public function edit(JobTitle $jobTitle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JobTitle  $jobTitle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobTitle $jobTitle)
    {
        $validate = $request->validate([
            'job_title'=>'required|max:255'
        ]);

        $jobTitle->job_title = $request->job_title;
        $jobTitle->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobTitle  $jobTitle
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobTitle $jobTitle)
    {
        // $usersImpacted = $jobTitle->users(); 
        // foreach ($usersImpacted as $user) {
        //     $user->job_titles()->detach($jobTitle->id);
        // }
        $jobTitle->delete();

        return redirect()->back();

    }
}
