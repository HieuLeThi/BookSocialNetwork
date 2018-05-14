<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Book;
use DB;
use App\Rating;
use App\Topic;

class HomeController extends Controller
{
    public function index()
    {
        
        $categories = Topic::all();
        $authors = User::all()
        		->where('role', '=', 2);
        $books = Book::select('books.*')
        		->orderBy('created_at', 'desc')
                ->where('status', '1')
        		->limit(6)
        		->get();
        $fields =  [
            'books.id',
            'books.title',
            'books.picture',
            DB::raw("SUM(ratings.rating) as average_rating")
        ];
        $topBooks = Book::select($fields)
                        ->join('ratings', 'ratings.book_id', 'books.id')
                        ->groupBy('books.id')
                        ->orderBy('average_rating', 'desc')
                        ->get();
                        // dd($topBooks);
        return view('frontend.home.index', compact('categories', 'authors', 'books', 'topBooks'));
    }
}
