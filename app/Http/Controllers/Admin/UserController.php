<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Book;
use App\Models\Category;

use App\Models\User;
use App\Services\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $users=User::all();
        return view('admin.User.index',compact('users'));
    }

        public function dashboard()
    {
        $count_book=count( Category::all());
        $count_course=count(Book::all());
        return view('admin.dashboard',compact('count_book','count_course'));
    }

    public function create()
    {
            $categories=Category::all();
                 return view('admin.User.create',compact('categories'));
    }


    public function store(CreateUserRequest $request,FileService $fileService)
    {

       $inputs= $request->except(['_token', '_method']);

      if($request->file('image')){

          $inputs['image']= $fileService->upload($request->file('image'), 'files');
      }
        $inputs['password']=Hash::make( $inputs['password']);
        $user=User::create($inputs);

        $user->categories()->attach( Category::find($inputs['category_id']));
        if($user){
            return redirect(route('user.index'))->with('success',"$user has successfully added ");

        }

    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $user=User::findOrFail($id);
        $categories=Category::all();
        return view('admin.User.edit',compact('user','categories'));
    }

    public function update(UpdateUserRequest $request, $id,FileService $fileService)
    {
        $inputs= $request->except(['_token', '_method','category_id','user_request']);
        if($request->password === null) {
            unset($inputs['password']);
        }else{
            $inputs['password'] = Hash::make($inputs['password']);
        }
        if($request->file('image')){
            $inputs['image']= $fileService->upload($request->file('image'), 'files');
        }
        $user = User::where('id', '=', $id)->update($inputs);

        if($request->category_id !== null) {
                 $user = User::find($id);
                 $user->categories()->sync(Category::find($request->category_id));
             }

        if($request->user_request){
            return  back()->with('success',"suuuu ");
    }else{
            return redirect(route('user.index'))->with('success',"$request->name has successfully updated ");
         }
    }

    public function profile_user(){

        $id=auth()->user()->id;
        $user=User::findOrFail($id);
        $count_pending=$this->count_request($id ,'-1');
        $count_accepted=$this->count_request($id ,'0');
        $count_rejected=$this->count_request($id ,'1');

        return view('profile',compact('user','count_pending','count_accepted','count_rejected'));

    }

    public function count_request($id ,$status ){

        $request_count=\App\Models\Request::where(['user_id'=>$id,'status'=>$status])->get();
        return count($request_count);

    }

    public function waiting_page(){
        if(auth()->user()){
            $name=auth()->user()->name;
            return view('waiting_page',compact('name'));

        }else {
             abort(404);
        }
   }
   public function destroy($id)
    {
        //
    }
}
