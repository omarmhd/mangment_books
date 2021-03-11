<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Book;
use App\Models\Course;
use App\Models\User;
use App\Services\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();

        return view('admin.User.index',compact('users'));
    }

        public function dashboard()
    {
        $count_book=count( Course::all());
        $count_course=count(Book::all());


        return view('admin.dashboard',compact('count_book','count_course'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            $courses=Course::all();
        return view('admin.User.create',compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request,FileService $fileService)
    {

       $inputs= $request->except(['_token', '_method']);

      if($request->file('image')){

          $inputs['image']= $fileService->upload($request->file('image'), 'files');
      }
        $inputs['password']=Hash::make( $inputs['password']);
        $user=User::create($inputs);

        $user->courses()->attach( Course::find($inputs['course_id']));
        if($user){
            return redirect(route('user.index'))->with('success',"$user has successfully added ");

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    public function edit($id)
    {
        $user=User::findOrFail($id);
        $courses=Course::all();
        return view('admin.User.edit',compact('user','courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id,FileService $fileService)
    {

        $inputs= $request->except(['_token', '_method','course_id']);

        if($request->password === null) {
            unset($inputs['password']);
        }else{
            $inputs['password'] = Hash::make($inputs['password']);
        }
        if($request->file('image')){

            $inputs['image']= $fileService->upload($request->file('image'), 'files');
        }



        $user=User::where('id','=',$id)->update($inputs);
        $user=User::find($id);
        $user->courses()->sync(Course::find( $request->course_id));

        if($user){
            return redirect(route('user.index'))->with('success',"$request->name has successfully updated ");

        }
    }

    public function waiting_page(){

        if(auth()->user()){
            $name=auth()->user()->name;

            return view('waiting_page',compact('name'));

        }else{

            abort(404);

        }


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
