<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use App\Models\Whislist;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function accountCostumer($user_id, $session_id)
    {
        $page_name = "account_customer";
        $cart = Cart::where('session_id', $session_id)->get();
        $qty = 0;

        foreach ($cart as $list) {
            $qty += $list->qty;
        }

        $user = User::find($user_id);

        $qty_whislist = 0;
        $list_whislist = Whislist::where('user_id', auth()->user()->id)->get();
        foreach ($list_whislist as $whislist) {
            $qty_whislist += $whislist->qty;
        }

        return view('customer.account-customer', compact('page_name', 'user', 'session_id', 'qty','qty_whislist'));
    }

    public function updateCustomer(Request $request)
    {
        $update = User::find($request->id);
        $update->name = $request->name;
        $update->email = $request->email;
        $update->address = $request->address;
        $update->gender = $request->gender;
        $update->dob = $request->dob;
        $update->handphone= $request->handphone;
        $update->save();

        Toastr::success('Account User Success Update', 'Success');
        return redirect('/customer/account/'.$request->id.'/'.$request->session_id);
    }

    public function index()
    {
        if (auth()->user()->remember_token) {
            $session_id = auth()->user()->remember_token;
        } else {
            $session_id = session()->getId();
        }
        $page_name = "home_page";
        $product = Product::all();
        $cart = Cart::where('session_id', $session_id)->get();
        $qty = 0;

        foreach ($cart as $list) {
            $qty += $list->qty;
        }



        return view('index', compact('product', 'page_name', 'session_id', 'qty'));
    }

    public function addWhislits($id, $user_id)
    {
        $cart = Cart::find($id);
        $session_id = $cart->session_id;

        $whislist = new Whislist();
        $whislist->product_id = $cart->product_id;
        $whislist->category_id = $cart->category_id;
        $whislist->user_id = $user_id;
        $whislist->name = $cart->name;
        $whislist->price = $cart->price;
        $whislist->qty = $cart->qty;
        $whislist->image = $cart->image;
        $whislist->save();
        Cart::destroy($id);

        Toastr::success('Product success add whislist', 'Success');
        return redirect('/customer/list-whislist/' . $user_id . '/' . $session_id);
    }

    public function showWhislits($user_id, $session_id)
    {
        $page_name = 'whislist';
        $cart = Cart::where('session_id', $session_id)->get();
        $qty = 0;

        foreach ($cart as $list) {
            $qty += $list->qty;
        }

        $qty_whislist = 0;
        $list_whislist = Whislist::where('user_id', $user_id)->get();
        foreach ($list_whislist as $whislist) {
            $qty_whislist += $whislist->qty;
        }

        return view('customer.whislist', compact('list_whislist', 'qty', 'session_id', 'page_name', 'qty_whislist'));
    }

    public function addCartFormWhislist($id, $session_id)
    {
        try {

            $whislist = Whislist::find($id);

            $update = Cart::where('product_id', $whislist->product_id)
                ->where('session_id', $session_id)->first();
            if ($update) {
                $update->session_id = $session_id;
                $update->product_id = $whislist->product_id;
                $update->category_id = $whislist->category_id;
                $update->name = $whislist->name;
                $update->image = $whislist->image;
                $update->qty += $whislist->qty;
                $update->price = $whislist->price;
                $update->save();
                $this->destroy($id, $session_id);
                return redirect('/cart/' . $session_id);
            } else {
                $data = new Cart();
                $data->session_id = $session_id;
                $data->product_id = $whislist->product_id;
                $data->category_id = $whislist->category_id;
                $data->name = $whislist->name;
                $data->image = $whislist->image;
                $data->qty = $whislist->qty;
                $data->price = $whislist->price;
                $this->destroy($id, $session_id);
                $data->save();
                return redirect('/cart/' . $session_id);
            }
        } catch (\Exception $e) {
            Toastr::error('Product failed to add cart', 'Error');
            return redirect('/customer/list-whislist/' . $whislist->user_id . '/' . $session_id);
        }
    }

    public function destroy($id, $session_id)
    {
        try {
            Whislist::destroy($id);
            return redirect('/customer/list-whislist/' . $id . '/' . $session_id);
        } catch (\Exception $e) {
            Toastr::error('Product failed to add cart', 'Error');
            return redirect('/customer/list-whislist/' . $id . '/' . $session_id);
        }
    }
}
