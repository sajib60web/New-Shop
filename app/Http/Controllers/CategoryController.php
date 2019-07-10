<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use App\Category;
use DB;

class CategoryController extends Controller {

    public function addCategory() {
        return view('admin.category.add-category');
    }

    public function saveCategory(Request $request) {
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->publication_status = $request->publication_status;
        $category->category_description = $request->category_description;
        $category->save();
//        Category::create($request->all());
//        DB::table('categories')->insert([
//            'category_name' => $request->category_name,
//            'publication_status' => $request->publication_status,
//            'category_description' => $request->category_description
//        ]);
        Session::flash('massage', 'Category Insert successfully');
        return Redirect('/manage-category');
    }

    public function manageCategory() {
        $category_info = Category::all();
        return view('admin.category.manage-category', ['category_info' => $category_info]);
    }

    public function publishedCategory($id) {
        DB::table('categories')
                ->where('id', $id)
                ->update(['publication_status' => 1]);
        Session::flash('massage', 'Category Published Successfully');
        return Redirect::to('/manage-category');
    }

    public function unpublishedCategory($id) {
        DB::table('categories')
                ->where('id', $id)
                ->update(['publication_status' => 0]);
        Session::flash('massage', 'Category Unpublished Successfully');
        return Redirect::to('/manage-category');
    }

    public function editCategory($id) {
        $category_info = Category::find($id);
        return view('admin.category.edit-category', ['category_info' => $category_info]);
    }

    public function updateCategory(Request $request) {
        $category_up = Category::find($request->category_id);
        $category_up->category_name = $request->category_name;
        $category_up->publication_status = $request->publication_status;
        $category_up->category_description = $request->category_description;
        $category_up->save();
        Session::flash('massage', 'Category Update Successfully');
        return Redirect::to('/manage-category');
    }

    public function deleteCategory($id) {
        DB::table('categories')
                ->where('id', $id)
                ->delete();
        Session::flash('massage', 'Category Delete Successfully');
        return Redirect::to('/manage-category');
    }

}
