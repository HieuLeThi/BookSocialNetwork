<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;
use Post;
use Book;

class PostController extends Controller
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
        
        // return view('frontend.home.showbook', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\PostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        // dd('vv');
        // $postFields = $request->all();
        // $postFields['user_id'] = Auth::user()->id;
        // $postFields['book_id'] = 1;
        // if($request->check_post == null) {
        //     $role_post = '0';
        // }
        // else $role_post = '1';
        // $postFields['role_post'] = $role_post;
        // $post = Post::create($postFields);
        // return view('frontend.home.showbook');
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
    }

    public function getReview($id)
    {
        dd('ahihi');
        $book = Book::find($id);
        return view('showbook.show', ['id' => $book->id]);
    }
    public function postReview($id, Request $request)
    {
        $book = Book::find($id);
        $postFields['user_id'] = Auth::user()->id;
        $postFields['book_id'] = $id;
        if($request->check_post == null) {
            $role_post = '0';
        }
        else $role_post = '1';
        $postFields['role_post'] = $role_post;
        $postFields['content'] = $request->content;
        $post = Post::create($postFields);
        return redirect()->route('showbook.show', ['id' => $book->id]);
    }
}
