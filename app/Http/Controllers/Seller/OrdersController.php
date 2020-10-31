<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $page_name = "Order List";
        $order = Order::all();
        return view('admin.order.order-list', compact('page_name', 'order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(Request $request)
    {
        try {
            $data = Order::find($request->id);
            $data->status = $request->status;
            $data->save();

            Toastr::success('Status success change', 'Success');
            return redirect('/seller/order');

        } catch (\Exception $e) {
            Toastr::error('Status failed change', 'Error');
            return redirect('/seller/order');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function invoiceOrder()
    {
        $page_name = 'Invoice Order';
        return view('admin.order.invoice-order', compact('page_name'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function report()
    {
        //
        $page_name = "Monthly Report";
        $report = DB::select("SELECT MONTH(date_order) as date_order, sum(subtotal) as total FROM `orders` WHERE `status`='Terima Transaksi' GROUP BY MONTH(date_order) ");
        return view('admin.order.report', compact('page_name','report'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
