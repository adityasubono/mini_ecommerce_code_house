<?php

namespace App\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.index');
    }

    public function handleAdmin()
    {
        return view('admin');
    }

    public function handleCustomer()
    {
        return redirect('/customer/index');
    }

    public function handleSeller()
    {
        Toastr::success('Selamat Datang', 'Success');
        return view('admin.index');
    }
}
