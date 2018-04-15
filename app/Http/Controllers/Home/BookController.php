<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Book;
use DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd('vo');
        return view('user.index');
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
        $fields = [
            'books.id',
            'books.topic_id',
            'books.title',
            'books.description',
            'books.more_description',
            'books.picture',
            DB::raw("(SELECT users.name FROM users where books.author = users.id) AS name_author"),
            DB::raw("(SELECT users.avatar_url FROM users where books.author = users.id) AS avatar_author"),
            DB::raw("(SELECT users.liking FROM users where books.author = users.id) AS liking_author")
            // DB::raw("(COUNT(book.id) FROM books WHRE book.author = users.id) AS count_book_author")

        ];
        $book = Book::select($fields)
                ->where('id', $id)
                ->firstOrFail();
        return view('frontend.home.showbook', compact('book'));
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
}
