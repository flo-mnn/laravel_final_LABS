<?php

namespace App\Http\Controllers;

use App\Mail\NewsletterMail;
use App\Mail\NewsletterToAllMail;
use App\Models\Newsletter;
use App\Models\Title;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('send','index');
        $this->middleware('isWebmaster')->only('send','index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.newsletters',[
            'newsletters'=>Newsletter::all(),
            'currentPage'=>'Send a Newsletter',
            'middlePage'=>null,
            'titles'=>Title::all(),
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
        $validate = $request->validateWithBag('newsletter',[
            'email'=>'required|email|unique:newsletters|max:255'
        ]);

        $newsletter = new Newsletter();
        $newsletter->email = $request->email;
        $newsletter->save();

        Mail::to($newsletter->email)->send(new NewsletterMail($newsletter));
        return redirect()->back()->with('newsletter','Thank you for subscribing to our newsletter');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function show(Newsletter $newsletter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function edit(Newsletter $newsletter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Newsletter $newsletter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Newsletter $newsletter)
    {
        // $newsletter->delete();

    }

    public function send(Request $request)
    {
        $content = [
            'title'=>$request->title,
            'content'=>$request->content,
        ];
        foreach (Newsletter::all() as $newsletter) {
            Mail::to($newsletter->email)->send(new NewsletterToAllMail($content));
        }

        return redirect()->back()->with('status','Newsletter sent to all');

    }
    public function unsubscribe(Request $request)
    {
        $todelete = Newsletter::where('email',$request->email)->get();

        if ($todelete->isNotEmpty()) {
            $todelete[0]->delete();
            return ('You have unsubscribed from our newsletter');
        } else {
            return ('No record of this email address');
        }
        


    }
}
