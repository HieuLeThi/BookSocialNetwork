<?php

namespace App\Http\Controllers\Author;

use Illuminate\Http\Request;
use App\Topic;
use App\Book;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBookRequest;
use App\Http\Requests\EditBookRequest;
use Illuminate\Support\Facades\Auth;
use App\Libraries\Image;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fields = [
            'books.id',
            'books.title',
            'books.picture',
            // Time read
            //  total_rating'),
        ];
        $author = Auth::user()->id;
        $books = Book::select($fields)
            // ->leftJoin('books', 'books.category_id', '=', 'books.id')
            // ->groupBy('books.id')
            ->where('books.author', '=', $author)
            ->paginate(config('define.books.limit_rows'));
       return view('backend.author.listbook', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$categories = Topic::select('id', 'title')->get();
       return view('backend.author.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateBookRequest $request send request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBookRequest $request)
    {
        $bookFields = $request->all();
        $bookFields['status'] = '0';
        $bookFields['author'] = Auth::user()->id;
        if ($request->hasFile('picture')) {
            $bookFields['picture'] = Image::update($request->picture);
        } else {
            $bookFields['picture'] = config('image.book.default_name_image');
        }
        $book = Book::create($bookFields);
        return redirect()->route('books.index')->with('status', 'Add new book success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        // return view('frontend.home.showbook');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fields = [
            'id',
            'title'
        ];
        $book = Book::findOrFail($id);
        $categories = Topic::select($fields)->get();
        return view('backend.author.update', compact('book', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\EditBookRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditBookRequest $request, Book $book)
    {
        $oldPicturePath = $book->picture;
        if ($request->hasFile('picture')) {
            $book->picture = Image::update($request->picture);
        }
        $book->update($request->except('picture'));
        $oldPicture = Book::checkDefaultImage($oldPicturePath);
        if ($oldPicture) {
            Image::delete($oldPicture);
        }
        return redirect()->route('books.index')->with('status', 'Edit book success!');
    }

    /**
     * Delete a book and relationship.
     *
     * @param Book $book object book
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
            $picture = Book::checkDefaultImage($book->picture);
            if ($picture) {
                Image::delete($picture);
            }
            $book->delete();
            return redirect()->route('books.index')->with('status', 'Delete book success!');
    }
}
