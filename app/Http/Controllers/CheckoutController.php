<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Mail;
use Session;
use Redirect;
use App\Order;
use App\Shipping;
Use App\Payment;
use App\OrderDetail;
use Gloudemans\Shoppingcart\Facades\Cart;
use DB;

class CheckoutController extends Controller {

    public function checkOut() {
        return view('frontEnd.checkOut.check-out');
    }

    public function customerRegister(Request $request) {
        $this->validate($request, [
            'email_address' => 'email|unique:customers,email_address'
        ]);

        $customer = new Customer();
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email_address = $request->email_address;
        $customer->password = md5($request->password);
        $customer->phone_number = $request->phone_number;
        $customer->address = $request->address;
        $customer->save();
        $customerId = $customer->id;
        Session::put('customerId', $customerId);
        Session::put('customerName', $customer->first_name . ' ' . $customer->last_name);
        $data = $customer->toArray();
        Mail::send('frontEnd.mails.configuration-mail', $data, function ($massage) use($data) {
            $massage->to($data['email_address']);
            $massage->subject('configuration mail');
        });
        return Redirect::to('/checkOut/shipping');
    }

    // public function customerLogin(Request $request) {
    //  $customer = Customer::where('email_address', $request->email_address)->first();
    //  if (password_verify($request->password, $customer->password)) {
    //  Session::put('customerId', $customer->id);
    //  return Redirect::to('/checkOut/shipping');
    //  } else {
    //  Session::flash('massage', 'Faul  valid Password de...');
    //  return Redirect::to('/checkOut');
    //  }
    //  } 

    public function customerLogin(Request $request) {
        $email_address = $request->email_address;
        $password = md5($request->password);

        $customer = DB::table('customers')
                ->where('email_address', $email_address)
                ->where('password', $password)
                ->first();
        if ($customer) {
            Session::put('customerId', $customer->id);
            Session::put('customerName', $customer->first_name . ' ' . $customer->last_name);
            return Redirect::to('/checkOut/shipping');
        } else {
            Session::flash('massage', 'Faul  valid Password de...');
            return Redirect::to('/checkOut');
        }
    }
    
    public function newCustomerLogin() {
        return view('frontEnd.Customer.customer-login');
    }

    public function checkOutShipping() {
        $customer = Customer::find(Session::get('customerId'));
        return view('frontEnd.checkOut.checkOut-shipping', [
            'customer' => $customer
        ]);
    }

    public function newShipping(Request $request) {
        $shipping = new Shipping();
        $shipping->full_name = $request->full_name;
        $shipping->email_address = $request->email_address;
        $shipping->phone_number = $request->phone_number;
        $shipping->address = $request->address;
        $shipping->save();
        Session::put('shippingId', $shipping->id);
        return Redirect::to('/checkOut/payment');
    }

    public function checkOutPayment() {
        return view('frontEnd.checkOut.checkOut-payment');
    }

    public function newOrder(Request $request) {
        $paymentType = $request->payment_type;
        if ($paymentType == 'Cash') {
            $order = new Order();
            $order->customer_id = Session::get('customerId');
            $order->shipping_id = Session::get('shippingId');
            $order->order_total = Session::get('orderTotal');
            $order->save();

            $payment = new Payment();
            $payment->order_id = $order->id;
            $payment->payment_type = $paymentType;
            $payment->save();

            $cartProducts = Cart::content();
            foreach ($cartProducts as $cartProduct) {
                $OrderDetail = new OrderDetail();
                $OrderDetail->order_id = $order->id;
                $OrderDetail->product_id = $cartProduct->id;
                $OrderDetail->product_name = $cartProduct->name;
                $OrderDetail->new_price = $cartProduct->price;
                $OrderDetail->new_price = $cartProduct->price;
                $OrderDetail->quantity = $cartProduct->qty;
                $OrderDetail->save();
            }
            Cart::destroy();
            return Redirect::to('/complete/order');
        } elseif ($paymentType == 'Paypal') {
            
        } elseif ($paymentType == 'Bkash') {
            
        }
    }

    public function completeOrder() {
        return view('frontEnd.checkOut.completeOrder');
    }
    public function ajaxEmailCheck($id) {
        
    }

}
