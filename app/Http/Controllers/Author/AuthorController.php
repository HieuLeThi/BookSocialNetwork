<?php

namespace App\Http\Controllers\Author;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Book;
use Illuminate\Support\Facades\Auth;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.author.index');
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
        $book = Book::where('author', $id)->count();
        return view('backend.author.profile.edit', compact('book'));
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
        return redirect()->route('author.edit', ['id' => Auth::user()->id])->with('status', 'Edit account success!');
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
