<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Order;
use App\Customer;
use App\Shipping;
use App\Payment;
use App\OrderDetail;
use PDF;

class OrderController extends Controller {

    public function manageOrder() {
        $orders = DB::table('orders')
                ->join('customers', 'orders.customer_id', '=', 'customers.id')
                ->join('payments', 'orders.id', '=', 'payments.order_id')
                ->select('orders.*', 'customers.first_name', 'customers.last_name', 'payments.payment_type', 'payments.payment_status')
                ->get();
        return view('admin.manageOrder.manageOrder', ['orders' => $orders]);
    }

    public function viewOrderDetails($id) {
        $orders = Order::find($id);
        $customer = Customer::find($orders->customer_id);
        $shipping = Shipping::find($orders->shipping_id);
        $payment = Payment::where('order_id', $orders->id)->first();
        $orderDetail = OrderDetail::where('order_id', $orders->id)->get();

        return view('admin.manageOrder.viewOrderDetails', [
            'orders' => $orders,
            'customer' => $customer,
            'shipping' => $shipping,
            'payment' => $payment,
            'orderDetail' => $orderDetail
        ]);
    }

    public function viewOrderInvoice($id) {
        $orders = Order::find($id);
        $customer = Customer::find($orders->customer_id);
        $shipping = Shipping::find($orders->shipping_id);
        //$payment = Payment::where('order_id', $orders->id)->first();
        $orderDetail = OrderDetail::where('order_id', $orders->id)->get();
        return view('admin.manageOrder.viewOrderInvoice', [
            'orders' => $orders,
            'customer' => $customer,
            'shipping' => $shipping,
            'orderDetail' => $orderDetail
        ]);
    }

    public function downloadOrderInvoice($id) {
        $orders = Order::find($id);
        $customer = Customer::find($orders->customer_id);
        $shipping = Shipping::find($orders->shipping_id);
        $orderDetail = OrderDetail::where('order_id', $orders->id)->get();
        $pdf = PDF::loadView('admin.manageOrder.downloadOrderInvoice', [
                    'orders' => $orders,
                    'customer' => $customer,
                    'shipping' => $shipping,
                    'orderDetail' => $orderDetail
        ]);
        return $pdf->stream('invoice.pdf');
        //return $pdf->download('invoice.pdf');
    }

}
