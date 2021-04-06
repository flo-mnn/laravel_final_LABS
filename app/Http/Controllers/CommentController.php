<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\CommentUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\Undefined;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('isWebmaster')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.comments',[
            'comments'=>Comment::all(),
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
            'comment'=>'required|max:1500'
        ]);

        $comment = new Comment();
        // to add d-none in form:
        $comment->post_id = $request->post_id;
        $comment->comment = $request->comment;
        if (Auth::check()) {
            $comment->user_id = Auth::id();
        } else {
            $alreadyCommented = CommentUser::all()->where('email',$request->email);
            if ($alreadyCommented->isNotEmpty()) {
                $comment_user_id = CommentUser::find($alreadyCommented[0]->id);
                $comment->comment_user_id = $comment_user_id->id;
            } else {
                $comment_user = new CommentUser();
                $comment_user->name = $request->name;
                $comment_user->email = $request->email;
                $comment_user->save();
                $comment->comment_user_id = $comment_user->id;
            }
        }
        $comment->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->back();
    }
}
