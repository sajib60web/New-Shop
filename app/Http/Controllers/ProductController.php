<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
Use App\Category;
use App\Brand;
use App\Product;
use DB;

class ProductController extends Controller {

    public function addProduct() {
        $category = Category::where('publication_status', 1)->get();
        $brand = Brand::where('publication_status', 1)->get();
        return view('admin.product.add-product', ['category' => $category, 'brand' => $brand]);
    }

    public function saveProduct(Request $request) {
        $productImage = $request->file('product_image');
        $imageName = $productImage->getClientOriginalName();
        $directory = 'product-image/';
        $imageUrl = $directory . $imageName;
        $productImage->move($directory, $imageName);

        $product = new Product();
        $product->product_name = $request->product_name;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->new_price = $request->new_price;
        $product->old_price = $request->old_price;
        $product->quantity = $request->quantity;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->product_image = $imageUrl;
        $product->publication_status = $request->publication_status;
        $product->save();

        Session::flash('massage', 'Product Insert successfully');
        return Redirect::to('/manage-product');
    }

    public function manageProduct() {
        $product = DB::table('products')
                ->join('categories', 'products.category_id', '=', 'categories.id')
                ->join('brands', 'products.brand_id', '=', 'brands.id')
                ->select('products.*', 'categories.category_name', 'brands.brand_name')
                ->get();
        return view('admin.product.manage-product', ['product' => $product]);
    }

    public function publishedProduct($id) {
        DB::table('products')
                ->where('id', $id)
                ->update(['publication_status' => 1]);
        Session::flash('massage', 'Product Published Successfully');
        return Redirect::to('/manage-product');
    }

    public function unpublishedProduct($id) {
        DB::table('products')
                ->where('id', $id)
                ->update(['publication_status' => 0]);
        Session::flash('massage', 'Product Unpublished Successfully');
        return Redirect::to('/manage-product');
    }

    public function editProduct($id) {
        $categories = Category::where('publication_status', 1)->get();
        $brands = Brand::where('publication_status', 1)->get();
        $productById = Product::where('id', $id)->first();
        return view('admin.product.edit-product', [
            'productById' => $productById,
            'categories' => $categories,
            'brands' => $brands
        ]);
    }

    public function productImageUpdate($product, $request, $imageUrl) {

        $product->product_name = $request->product_name;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->new_price = $request->new_price;
        $product->old_price = $request->old_price;
        $product->quantity = $request->quantity;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->product_image = $imageUrl;
        $product->publication_status = $request->publication_status;
        $product->save();
    }

    public function updateProduct(Request $request) {
        $product = Product::find($request->product_id);
        $productImage = $request->file('product_image');
        if ($productImage) {
            unlink($product->product_image);

            $imageUrl = $this->productImageUpdate($request);

            Session::flash('massage', 'Product Update Successfully');
            return Redirect::to('/manage-product');
        } else {
            $product->product_name = $request->product_name;
            $product->category_id = $request->category_id;
            $product->brand_id = $request->brand_id;
            $product->new_price = $request->new_price;
            $product->old_price = $request->old_price;
            $product->quantity = $request->quantity;
            $product->short_description = $request->short_description;
            $product->long_description = $request->long_description;
            //$product->product_image = $imageUrl;
            $product->publication_status = $request->publication_status;
            $product->save();
            Session::flash('massage', 'Product Update Successfully');
            return Redirect::to('/manage-product');
        }
    }

}
