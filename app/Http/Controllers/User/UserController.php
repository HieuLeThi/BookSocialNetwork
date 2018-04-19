<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditProfileRequest;
use App\Book;
use App\StatusBook;
use DB;
use App\User;
use App\Post;
use App\Libraries\Image;
use App\Topic;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {   
    	$fields = [
            'books.*',
            DB::raw("(SELECT users.name FROM users where books.author = users.id) AS name_author")
        ];
        $status = '2';
        $books = Book::select($fields)
                       ->join('statusbooks', 'statusbooks.book_id', '=', 'books.id')
                       ->where('statusbooks.user_id', '=', Auth::user()->id)->where('statusbooks.status','=', $status)
                       ->get();
        $categories = Topic::all();
        $wtr = Book::select($fields)
                       ->join('statusbooks', 'statusbooks.book_id', '=', 'books.id')
                       ->where('statusbooks.user_id', '=', Auth::user()->id)->where('statusbooks.status','=', 1)
                       ->get();
        $newbook = Book::select($fields)
                ->orderBy('created_at', 'desc')
                ->limit(2)
                ->get();
        // $book = StatusBook::where('', $id)->count(); 
            //     $posts = DB::table('posts')
            // ->join('contacts', 'users.id', '=', 'contacts.user_id')
            // ->join('orders', 'users.id', '=', 'orders.user_id')
            // ->select('users.*', 'contacts.phone', 'orders.price')
            // ->get();
        $fieldss = [
            'posts.*',
            // DB::raw("(SELECT users.name FROM users where books.author = users.id) AS name_author")
        ]; 
        $posts = Post::select($fieldss)
                ->where('role_post', '=', 1)
                ->orderBy('created_at', 'desc')
                ->get();
    	return view('user.index', compact('books', 'categories', 'wtr', 'newbook', 'posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('user.profile');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\EditProfileRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditProfileRequest $request, $id)
    {
        if($request->gender == 'female') {
            $gender = '1';
        }
        elseif($request->gender == 'male') {
            $gender = '2';
        }
        // else {
        //   $gender = nullable();
        // }
        if($request->hasFile('avatar_url')) {
          $arrUrl = $request->file('avatar_url');
          $name = $arrUrl->getClientOriginalName();
          $pic = asset('/images/users/').'/'.$name;
          $arrUrl = $arrUrl->move("images/users",$name);


        }
        else
        {
          $pic = User::findOrFail($id)->avatar_url;
        }
        if(isset($request->password)) {
            $password = Hash::make($request->password);
        }
        else {
            $password = Auth::user()->password;
        } 
        $user = User::findOrFail($id);
        $user->liking = $request->liking;
        $user->gender = $gender;
        $user->avatar_url = $pic;
        $user->password = $password;
        $user->save();
        return redirect()->route('user.show', ['id' => Auth::user()->id])->with('status', 'Edit account success!');
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
