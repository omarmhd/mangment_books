<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class RequestController extends Controller
{
public function index(){

    $requests=\App\Models\Request::all();
    return view('user.requests',compact('requests'));
}

public function create($id){

      $book=Book::find($id);
      $date=date("y-m-d");
    return view('user.create_request',compact('book','date'));
}
public  function store(Request $request){


    $request_table=\App\Models\Request::where('user_id',auth()->user()->id)->where('book_id',$request->book_id)->where('request',$request->request_type)->get();

    if($request_table->toArray()) {
        return back()->withErrors('Your request already exists');

    }
  \App\Models\Request::create([
        'request'=>$request->request_type,
        'status'=>'-1',
        'book_id'=>$request->book_id,
        'user_id'=>auth()->user()->id,
        'date'=>$request->date,
        'new_book'=>$request->new_book,
        'new_book_link'=>$request->new_book_link

    ]);


    return redirect(route('request.index'))->with('success','Your request has been sent successfully');
}
}
