<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\ContactEmail;
use App\Models\Email;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.emails',[
            'emails'=>Email::all(),
            'currentPage'=>'Contact Form',
            'middlePage'=>null,
            'subjects'=>Subject::all(),
            'contact_emails'=>ContactEmail::first(),
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
        $validate = $request->validateWithBag('contact',[
            'name'=>'required|max:255',
            'email'=>'required|email|max:255',
            'message'=>'required|max:2000'
        ]);

        $email = new Email();
        $email->name = $request->name;
        $email->email = $request->email;
        $email->message = $request->message;
        if($request->subject_id){
            if (Subject::all()->contains($request->subject_id)) {
                $email->subject_id = $request->subject_id;
            } else {
                return redirect()->back();
            };
            
        } else {
            if (Subject::all()->isNotEmpty()) {
                $email->subject_id = Subject::first();
            }
        }
        $email->save();

        Mail::to(ContactEmail::first()->email)->send(new ContactMail($email));
        return redirect()->back()->with('status', 'Mail Sent!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function show(Email $email)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function edit(Email $email)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Email $email)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function destroy(Email $email)
    {
        //
    }
}
