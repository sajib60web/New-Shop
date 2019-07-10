<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use App\Brand;
use DB;

class BrandController extends Controller {

    public function addBrand() {
        return view('admin.brand.add-brand');
    }

    public function saveBrand(Request $request) {
        $category = new Brand();
        $category->brand_name = $request->brand_name;
        $category->publication_status = $request->publication_status;
        $category->brand_description = $request->brand_description;
        $category->save();
//        Category::create($request->all());
//        DB::table('categories')->insert([
//            'category_name' => $request->category_name,
//            'publication_status' => $request->publication_status,
//            'category_description' => $request->category_description
//        ]);
        Session::flash('massage', 'Brand Insert successfully');
        return Redirect('/manage-brand');
    }

    public function manageBrand() {
        $brand_info = Brand::all();
        return view('admin.brand.manage-brand', ['brand_info' => $brand_info]);
    }

    public function publishedBrand($id) {
        DB::table('brands')
                ->where('id', $id)
                ->update(['publication_status' => 1]);
        Session::flash('massage', 'Brand Published Successfully');
        return Redirect::to('/manage-brand');
    }

    public function unpublishedBrand($id) {
        DB::table('brands')
                ->where('id', $id)
                ->update(['publication_status' => 0]);
        Session::flash('massage', 'Brand Unpublished Successfully');
        return Redirect::to('/manage-brand');
    }

    public function editBrand($id) {
        $brand_info = Brand::find($id);
        return view('admin.brand.edit-brand', ['brand_info' => $brand_info]);
    }

    public function updateBrand(Request $request) {
        $category_up = Brand::find($request->brand_id);
        $category_up->brand_name = $request->brand_name;
        $category_up->publication_status = $request->publication_status;
        $category_up->brand_description = $request->brand_description;
        $category_up->save();
        Session::flash('massage', 'Brand Update Successfully');
        return Redirect::to('/manage-brand');
    }

    public function deleteBrand($id) {
        DB::table('brands')
                ->where('id', $id)
                ->delete();
        Session::flash('massage', 'Brand Delete Successfully');
        return Redirect::to('/manage-brand');
    }

}
