<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
Use App\Category;
use App\Brand;
use App\Product;
use DB;
use Cart;

class CartController extends Controller {

    public function addToCart(Request $request) {
        $product = Product::find($request->id);
        Cart::add([
            'id' => $request->id,
            'name' => $product->product_name,
            'price' => $product->new_price,
            'qty' => $request->qty,
            'options' => [
                'image' => $product->product_image
            ]
        ]);
        return Redirect::to('/show-cart');
    }

    public function showCart() {
        $cart_products = Cart::content();
        return view('frontEnd.cart.show-cart', ['cart_products' => $cart_products]);
    }

    public function deleteCart($id) {
        Cart::remove($id);
        Session::flash('massage', 'Cart Delete successfully');
        return Redirect::to('/show-cart');
    }

    public function cartUpdate(Request $request) {
        $rowId = $request->rowId;
        $qty = $request->qty;
        Cart::update($rowId, $qty);
        return Redirect::to('/show-cart');
    }

    public function customerLogout() {
        Session::forget('customerId', '');
        Session::forget('customerName', '');
        //Session::flash('message', "You Are Logout Successfully");
        return Redirect::to('/');
    }

}
