<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Book;
use App\Like;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookSearch = Book::select('books.*')
                    ->where('title', request('search'))
                    ->orWhere('title', 'like', '%' . request('search') . '%')
                    ->orderby('created_at', 'desc')
                    ->get();
        return view('frontend.home.showbookbysearch', compact('bookSearch'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('frontend.home.showbook');
    }

    public function store(Request $request)
    {
        if($request->check_post == null) {
            $role_post = '0';
        }
        else $role_post = '1';
    	$post = Post::create([
            'user_id' => Auth::user()->id,
            'content' => $request->content,
            'book_id' => $request->id,
            'role_post' => $role_post,
        ]);
        return redirect()->route('showbook.show', ['id' => $request->id]);
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

       dd('ahihi');
        return view('frontend.home.showbook');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $book_id = $post->book_id;
        $post->delete();
        return redirect()->route('showbook.show', ['id' => $book_id]);
    }
}
