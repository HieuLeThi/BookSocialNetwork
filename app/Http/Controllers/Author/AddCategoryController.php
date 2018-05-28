<?php

namespace App\Http\Controllers\Author;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Topic;

class AddCategoryController extends Controller
{
    public function createCategory(Request $request)
    {
        // dd($request->all());
        $topic = new Topic();
        $topic->title = $request->title; 
        $topic->save();
        return redirect()->route('books.create');
    }
}
