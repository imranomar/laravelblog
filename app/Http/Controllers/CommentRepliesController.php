<?php

namespace App\Http\Controllers;

use Auth;
use App\CommentReply;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CommentRepliesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $comment = Comment::findOrFail($id);
        $replies = $comment->replies;
        return view('admin.comments.replies.show',compact('replies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $cr = CommentReply::findOrFail($id);
        $cr->update($request->all());

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        CommentReply::destroy($id);
        return redirect()->back();
    }

    public function createReply(Request $request)
    {
        //return $request->all(); exit;
        $user  = Auth::user();

        $data = [
            'body' => $request->body,
            'comment_id' => $request->comment_id,
            'author' => $user->name,
            'email' => $user->email,
            'photo' => $user->photos->file,

        ];

        CommentReply::create($data);
        Session::flash('flash_message','reply Submitted');
        return redirect()->back();
    }
}
