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
        // $books = Book::all();
        // $user = $books->users()->where('role', '=','2');
        // dd($user);
        // $user = User::where('role', '2')->first();
        // $books = Book::where('author', $user->id)->get();
        // dd($books);
        $categories = Topic::select('id', 'title')->get();
        return view('frontend.home.index', compact('categories'));
        // return view('frontend.home.index', compact('books'));
    }
}
