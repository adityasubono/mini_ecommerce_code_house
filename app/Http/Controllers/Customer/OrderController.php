<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use App\Models\Whislist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function order($user_id, $session_id)
    {
        $page_name = 'checkout';
        $cart = Cart::where('session_id', $session_id)->get();

        $subtotal = 0;
        $qty = 0;

        foreach ($cart as $list) {
            $subtotal += $list->price * $list->qty;
            $qty += $list->qty;
        }
        if ($subtotal == 0) {
            $delivery = 0;
        } else {
            $delivery = 10000;
        }

        $qty_whislist = 0;
        $list_whislist = Whislist::where('user_id', $user_id)->get();
        foreach ($list_whislist as $whislist) {
            $qty_whislist += $whislist->qty;
        }

        $user = User::find($user_id);

        return view('customer.order', compact('page_name', 'session_id', 'qty', 'user', 'cart', 'delivery', 'subtotal', 'qty_whislist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function orderList($user_id, $session_id)
    {

        $page_name = 'my_order';
        $cart = Cart::where('session_id', $session_id)->get();

        $subtotal = 0;
        $qty = 0;

        foreach ($cart as $list) {
            $subtotal += $list->price * $list->qty;
            $qty += $list->qty;
        }


        $qty_whislist = 0;
        $list_whislist = Whislist::where('user_id', $user_id)->get();
        foreach ($list_whislist as $whislist) {
            $qty_whislist += $whislist->qty;
        }

        $order = Order::where('customer_id', $user_id)->get();

        return view('customer.order-list',compact('page_name','order','session_id','qty_whislist','qty'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function storeOrderDetail(Request $request, $user_id, $session_id)
    {
        $rules = [
            'payment_method' => 'required',
        ];

        $customMessages = [
            'required' => 'Choose Payment Method!',
        ];

        $this->validate($request, $rules, $customMessages);

        $latest = Order::latest()->first();
        $string = preg_replace("/[^0-9\.]/", '', $latest->id ?? '1');


        $cart = Cart::where('session_id', $session_id)->get();
        $order = new Order();
        $order->invoice = 'INV' . (str_pad((int)$string + 1, 4, '0', STR_PAD_LEFT));
        $order->customer_id = $request->user_id;
        $order->customer_name = $request->name;
        $order->customer_phone = $request->phone;
        $order->customer_address = $request->address;
        $order->customer_email = $request->email;
        $order->subtotal = $request->subtotal;
        $order->payment_method = $request->payment_method;
        $order->date_order = Carbon::now();
        $order->save();
        foreach ($cart as $data_cart) {
            $order_detail = new OrderDetail();
            $order_detail->order_id = $order->invoice;
            $order_detail->product_id = $data_cart->product_id;
            $order_detail->price = $data_cart->price;
            $order_detail->qty = $data_cart->qty;
            $order_detail->total = $data_cart->price * $data_cart->qty;

            $product = Product::find($data_cart->product_id);
            $product->stock -= $data_cart->qty;
            $product->save();

            $order_detail->save();
        }

        return redirect('/customer/end-order/' . $user_id . '/' . $session_id);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function endOrder($user_id, $session_id)
    {
        $page_name = 'end_checkout';
        DB::table('cart')->where('session_id', $session_id)->delete();

        return view('customer.end-checkout',compact('page_name','session_id'));
    }


}
