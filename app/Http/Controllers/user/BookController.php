<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $user=User::find(auth()->user()->id);
        $categories =$user->categories;
        $requests=\App\Models\Request::where('user_id',auth()->user()->id)->get();
        $title='MY Books';
        $requests_to_check=$requests->toArray();
            return view('user.index',compact('categories','requests','requests_to_check','title'));




    }
    public function library()
{
    $requests=\App\Models\Request::where('user_id',auth()->user()->id)->get();
    $categories =Category::all();

    $requests_to_check=$requests->toArray();
    $title='Library (All Categories)';
    return view('user.index',compact('categories','requests','requests_to_check','title'));





}

    public function indexReservedBookUser()
    {

        $book_user=DB::table('book_user')->where('user_id',auth()->user()->id)->get();

        $book_user=  $book_user->toArray();
        return view('user.indexReservedBooks',compact('book_user'));

    }

    public function indexBooksRequiredToDeliver()
    {
        $book_user=DB::table('book_user')->where(['user_id'=>auth()->user()->id,'status'=>'1'])->get();
        $book_user=  $book_user->toArray();

        return view('user.indexReservedBooks',compact('book_user'));
    }



    public function destroy($id)
    {
        //
    }
}
