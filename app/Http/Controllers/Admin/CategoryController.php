<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories=Category::all();

        return view('admin.Category.index',compact('categories'));

    }


    public function create()
    {
        return view('admin.Category.create');
    }


    public function store(CreateCategoryRequest $request)
    {
        $inputs=$request->except('_method','_token');
        $category=Category::create($inputs);
        if($category){
            return redirect(route('Category.index'))->with('success',"The $category->name Category has been created successfully");
        }
    }


    public function show(Category $category)
    {

    }


    public function edit($id)
    {
        $category=Category::find($id);
        return view('admin.category.edit',compact('category'));
    }
  public function update(UpdateCategoryRequest  $request,$id)
    {
        $inputs=$request->except('_method','_token');
        $category=Category::where('id',$id)->update($inputs);
        if($category){
            return redirect(route('Category.index'))->with('success','The Category information has been successfully updated');
             }
   }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->back()->with('success','The Category  has been deleted successfully');
    }
}
