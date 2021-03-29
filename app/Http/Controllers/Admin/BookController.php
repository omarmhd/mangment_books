<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\createBookRequest;
use App\Http\Requests\CreateReservationRequest;
use App\Models\Book;
use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use App\Services\FileService;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books=Book::all();

        return view('admin.book.index',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $categories=Category::all();

        return view('admin.book.create',compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(createBookRequest $request,FileService $file)
    {
        $input=$request->except('_method','_token');

        if($request->file('cover')){
            $input['cover']= $file->upload($request->file('cover'),'files');

        }
        if($request->file('file')){
            $input['file']= $file->upload($request->file('file'),'files');
        }
        $book=Book::create($input);


        if($book){

            return redirect(route('book.index'))->with('success',"The $book->name has added successfuly");
        }
    }

    public function addReservedBook(CreateReservationRequest $request){

        $input=$request->except('_method','_token');
       $user= User::find($input['user_id']);
       $user->books()->attach(Book::find($input['book_id']));



    }

    public function updateReservedBook(CreateReservationRequest $request){

        $input=$request->except('_method','_token');
        $user= User::find($input['user_id']);
        $user->books()->sync(Book::find($input['book_id']));



    }
    public function addReservedBookPage()
    {

        $books=Book::all();
        $users=User::all();

        return view('admin.book.add_Reserved_book',compact('books','users'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */

    public function  show($id){


    }
    public function edit($id)
    {
       $book= Book::find($id);
        $categories=Category::all();
       return view('admin.book.edit',compact('book','categories'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,FileService $file)
    {
        $input=$request->except('_method','_token');

        if($request->file('cover')){
            $input['cover']= $file->upload($request->file('cover'),'files');

        }
        if($request->file('file')){
            $input['file']= $file->upload($request->file('file'),'files');
        }
        $book=Book::where('id',$id)->update($input);
        if($book){

            return redirect(route('book.index'))->with('success',"The book has updated successfuly");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
}
