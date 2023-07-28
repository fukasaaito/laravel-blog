<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    private $comment;


    /**
     * Display a listing of the resource.
     */

    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$post_id)
    {
        //
        $this->comment->user_id = Auth::user()->id;
        $this->comment->post_id = $post_id;
        $this->comment->body = $request->body;
        $this->comment->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show($post_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        //$this->comment->where('post_id',$id)->where('user_id',Auth::user()->id)->delete();
        $this->comment->destroy($id);
        //$sql = DELETE FROM comments WHERE post_id = $id AMS user_id = 2;
        //$comment = $this->comment->findOrFail($id)->delete();
        //$post_id = $this->comment->findOrFail($id)->post_id;

        //return redirect()->route('posts.show',['post_id' => $id]);
        return redirect()->back();
    }
}
