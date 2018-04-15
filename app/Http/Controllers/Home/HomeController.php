<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Book;
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
        		->limit(6)
        		->get();
        return view('frontend.home.index', compact('categories', 'authors', 'books'));
    }
}
