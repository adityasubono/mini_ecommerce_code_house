@extends('layouts.main')

@section('title', 'Selamat Datang Di Situs E-commerce Mini')

@section('content')
    <section class="ftco-section">
        <div class="container">
            <h3 class="mb-4 billing-heading">My Order</h3>
            <div class="cart-list">
                <table class="table">
                    <thead class="thead-primary">
                    <tr class="text-center">
                        <th>Date</th>
                        <th>Invoice</th>
                        <th>Subtotal</th>
                        <th>Payment Method</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($order as $list)
                        <tr class="text-center">
                            <td class="image-prod">{{$list->date_order}}</td>
                            <td class="product-name">{{$list->invoice}}</td>
                            <td class="price">Rp. {{number_format($list->subtotal,2)}}</td>
                            <td class="quantity">{{$list->payment_method}}</td>
                            <td class="total">{{$list->status}}</td>
                        </tr>
                    @empty
                        <tr class="text-center">
                            <td colspan="6"><h4 class="text-center text-danger">My Order Empty</h4></td>
                        </tr>

                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
