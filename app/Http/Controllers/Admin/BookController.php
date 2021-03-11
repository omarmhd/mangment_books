<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\createBookRequest;
use App\Models\Book;
use App\Models\Course;
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
       $courses=Course::all();

        return view('admin.book.create',compact('courses'));

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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $book= Book::find($id);
        $courses=Course::all();
       return view('admin.book.edit',compact('book','courses'));


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
