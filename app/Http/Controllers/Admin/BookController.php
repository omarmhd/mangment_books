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
use Illuminate\Auth\Access\Gate;
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

    public function storeReservedBook(CreateReservationRequest $request){

        $input=$request->except('_method','_token');
        $user= User::find($input['user_id']);

        $book=Book::find($input['book_id']);
        $user_book= $user->books()->attach($book,['collection_appointment'=>$input['collection_appointment'],'note'=>$input['note'],'user_name'=>$user->name,'book_name'=>$book->name,'status'=>'0']);
        return redirect()->route('admin.indexReservedBook.index')->with('success','The book has been successfully reserved');

    }


    public function updateReservedBook(CreateReservationRequest $request,$id){

        $input=$request->except('_method','_token');
        $user_book =DB::table('book_user')->where('id',$id)->update($input);
        if($user_book)
            return redirect()->route('admin.indexReservedBook.index')->with('success','The booked book information has been successfully modified');
    }
    public function editReservedBook($id){

        $user_book =DB::table('book_user')->find($id);
        $users=User::all();
        $books=Book::all();
        return view('admin.book.editReservedBooks',compact('user_book','users','books'));


    }

    public function indexReservedBook()
    {
        $user=auth()->user();

        $book_user=DB::table('book_user')->get();
        return view('admin.book.indexReservedBooks',compact('book_user'));

    }
    public function createReservedBook()
    {

        $books=Book::all();
        $users=User::all();
        return view('admin.book.add_Reserved_book',compact('books','users'));

    }

    public  function statusReservedBook($status,$id)
    {
        DB::table('book_user')->where('id',$id)->update(['status' => $status]);

        $message=$status=='1'?'A notification has been sent to the user':'The book has been successfully received';
        return redirect()->route('admin.indexReservedBook.index')->with('success', $message);
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
    public function destroy($id)
    {
        Book::find($id)->delete();
        return redirect()->back()->with('success','The Book has been deleted successfully');
    }
}
