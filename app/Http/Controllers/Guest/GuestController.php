<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Whislist;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->remember_token ?? ''){
            $session_id = auth()->user()->remember_token;
        }else {
            $session_id = session()->getId();
        }
//        dd($session_id);
        $page_name = "home_page";
        $product = Product::all();
        $cart = Cart::where('session_id', $session_id)->get();
        $qty = 0;

        foreach ($cart as $list) {
            $qty += $list->qty;
        }

        $qty_whislist = 0;
        $list_whislist = Whislist::where('user_id', auth()->user()->id ?? '')->get();
        foreach ($list_whislist as $whislist) {
            $qty_whislist += $whislist->qty;
        }

        $category = Category::all();
        return view('index', compact('product','category', 'page_name', 'session_id','qty','qty_whislist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function find(Request $request)
    {
        if (auth()->user()->remember_token ?? ''){
            $session_id = auth()->user()->remember_token;
        }else {
            $session_id = session()->getId();
        }

        $page_name = "home_page";
        $cart = Cart::where('session_id', $session_id)->get();
        $qty = 0;

        foreach ($cart as $list) {
            $qty += $list->qty;
        }

        $qty_whislist = 0;
        $list_whislist = Whislist::where('user_id', auth()->user()->id ?? '')->get();
        foreach ($list_whislist as $whislist) {
            $qty_whislist += $whislist->qty;
        }

        $product = Product::where('name', 'like', '%' .$request->find. '%')->get();

        return view('index', compact('product', 'page_name', 'session_id','qty','qty_whislist','product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            if (auth()->user()->remember_token ?? ''){
                $session_id = auth()->user()->remember_token;
            }else {
                $session_id = session()->getId();
            }

            $update = Cart::where('product_id', $request->product_id)
                ->where('session_id',$request->session_id)->first();
//            dd($update);
            if ($update) {
                $update->session_id = $session_id;
                $update->product_id = $request->product_id;
                $update->category_id = $request->category_id;
                $update->name = $request->name;
                $update->image = $request->image;
                $update->qty += $request->qty;
                $update->price = $request->price;
                $update->save();
                return redirect('/cart/' . $request->session_id);
            } else {
                $data = new Cart();
                $data->session_id = $session_id;
                $data->product_id = $request->product_id;
                $data->category_id = $request->category_id;
                $data->name = $request->name;
                $data->image = $request->image;
                $data->qty = $request->qty;
                $data->price = $request->price;
                $data->save();
                return redirect('/cart/' . $request->session_id);
            }
        } catch (\Exception $e) {
            Toastr::error('Product failed to add cart', 'Error');
            return redirect('/show/' . $request->product_id);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        if (auth()->user()->remember_token ?? ''){
            $session_id = auth()->user()->remember_token;
        }else {
            $session_id = session()->getId();
        }

        $cart = Cart::where('session_id', $session_id)->get();
        $qty = 0;

        foreach ($cart as $list) {
            $qty += $list->qty;
        }

        $page_name = 'detail_product';
        $product = Product::where('slug', $slug)->first();
        if ($product->discount > 0) {
            $discont = $product->discount / 100;
            $total_discont = $product->price - ($product->price * $discont);
        }
        if ($product->discount == 0) {
            $total_discont = $product->price;
        }

        return view('guest.detail-product', compact('product', 'page_name', 'total_discont', 'session_id','qty'));
    }

    public function listCart($session_id)
    {
        $page_name = "cart_list";
        $cart = Cart::where('session_id', $session_id)->get();

        $subtotal = 0;
        $qty =0;

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
        $list_whislist = Whislist::where('user_id', auth()->user()->id ?? '')->get();
        foreach ($list_whislist as $whislist) {
            $qty_whislist += $whislist->qty;
        }

        return view('customer.cart', compact('page_name', 'cart','qty', 'subtotal', 'session_id', 'delivery','qty_whislist'));
    }


    public function resetPassword(Request $request)
    {
        $page_name = 'reset_password';
        if (auth()->user()->remember_token ?? ''){
            $session_id = auth()->user()->remember_token;
        }else {
            $session_id = session()->getId();
        }



        return view('auth.reset_password',compact('session_id','page_name'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $page_name = 'cart_customer';

        return view('customer.cart', compact('page_name'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$session_id)
    {
        try {
            $cart = Cart::where('id', $id);
            $cart->delete();
            return redirect('/cart/'.$session_id);
        } catch (\Exception $e) {
            Toastr::error('Product failed to add cart', 'Error');
            return redirect('/cart/'.$session_id);
        }
    }

    public function postReset(Request $request){

        $data = User::where('email', $request->email)->first();

        if($data){
            Toastr::success('Telah Dikirim Ke Email'. $request->email , 'Success');
            return redirect('/reset-password');
        }else{
            Toastr::error('Email '. $request->email .' tidak terdaftar', 'Error');
            return redirect('/reset-password');
        }
    }
}
