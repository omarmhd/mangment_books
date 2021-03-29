<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public  function index(){

       $requests= \App\Models\Request::all();

        return   view('admin.requests.index',compact('requests'));


         }

    public  function index_ajax(){

        $requests= \App\Models\Request::all();
        $requests=$requests->toArray();

       return  response()->json(['success'=>'Data is successfully added','data'=>$requests]);

    }

    public function update_status($id,$status){


     $request= \App\Models\Request::find($id)->update([

        'status'=>$status
    ]);




    if($request){

        if($status=='1'){
            return  back()->with('success','The request has been accepted successfully');
        }else{
            return  back()->with('success','The request was successfully rejected');
        }

    }else{
        abort(404);
    }


}}
