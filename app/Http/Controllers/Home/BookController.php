<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Book;
use App\Post;
use DB;
use App\StatusBook;
use Illuminate\Support\Facades\Auth;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return view('user.mybook', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        dd($request); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $condition = ([
            'user_id' => Auth::user()->id,
            'book_id' => $request->id,
        ]);
        $statusBook = StatusBook::updateOrCreate($condition, ['status' => $request->status]);

        return $statusBook;
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
        $review = Post::select('posts.*')
                ->where('book_id', '=', $id)
                ->orderBy('created_at', 'desc')
                ->get();
        $bookRole = StatusBook::select('status')
                    ->where('book_id', '=', $id) 
                    ->where('user_id', '=', Auth::user()->id)
                    ->first(); 
        return view('frontend.home.showbook', compact('book', 'review','bookRole'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('frontend.home.showbook');
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
