<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Category;
use App\Brand;
use App\Product;

class NewShopController extends Controller {

    public function index() {
        $newProducts = Product::where('publication_status', 1)
                ->orderBy('id', 'DESC')
                ->take(8)
                ->get();
        return view('frontEnd.home.homeContent', [
            'newProducts' => $newProducts
        ]);
    }

    public function categoryProduct($id) {
        $categoryProducts = Product::where('category_id', $id)
                ->where('publication_status', 1)
                ->get();
        return view('frontEnd.category.categoryContent', [
            'categoryProducts' => $categoryProducts
        ]);
    }

    public function productDetails($id) {
        $categoryProducts = Product::where('id', $id)
                ->where('publication_status', 1)
                ->get();
        return view('frontEnd.productDetails.product-details', [
            'categoryProducts' => $categoryProducts
        ]);
    }

    public function contact() {
        return view('frontEnd.contact.contactContent');
    }

}
