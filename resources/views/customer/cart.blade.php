@extends('layouts.main')

@section('title', 'Selamat Datang Di Situs E-commerce Mini')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 ftco-animate fadeInUp ftco-animated">
                <h3>My Cart List</h3>
                <div class="cart-list">
                    <table class="table">
                        <thead class="thead-primary">
                        <tr class="text-center">
                            <th>#</th>
                            <th>Image</th>
                            <th>Product name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($cart as $list)
                            <tr class="text-center">
                                <td class="product-remove">
                                    <a href="/cart/delete/{{$list->id}}/{{$list->session_id}}"><span
                                            class="ion-ios-trash mr-3 mb-3"></span>Delete
                                    </a><br>
                                    <a href="/customer/add-whislist/{{$list->id}}/{{ Auth::user()->id ?? '' }}" {{ Auth::user()->id ?? 'hidden' }}>
                                        <span class="ion-ios-list-box mr-3"></span>Move to Whislist
                                    </a>
                                </td>
                                <td class="image-prod">
                                    <div class="img">
                                        <img
                                            src="{{ asset('assets/uploads/images/'.$list->category_id.'/'.$list->image) }}"
                                            class="img-thumbnail img-fluid" alt="{{$list->image}}">
                                    </div>
                                </td>
                                <td class="product-name">{{$list->name}}</td>
                                <td class="price">Rp. {{number_format($list->price,2)}}</td>
                                <td class="quantity">
                                    <div class="input-group mb-3">
                                        <input type="number"
                                               name="qty"
                                               class="quantity form-control input-number"
                                               value="{{$list->qty}}" min="1" max="10">
                                    </div>
                                </td>
                                <td class="total">Rp.{{ number_format($list->qty * $list->price,2) }}</td>
                            </tr>
                        @empty
                            <tr class="text-center">
                                <td colspan="6"><h4 class="text-center text-danger">Cart List Empty</h4></td>
                            </tr>

                        @endforelse
                        </tbody>
                    </table>
                </div>


                <div class="cart-total mb-3">
                    <h3>Cart Totals</h3>
                    <p class="d-flex">
                        <span>Subtotal</span>
                        <span>Rp. {{ number_format($subtotal,2)}}</span>
                    </p>
                    <p class="d-flex">
                        <span>Delivery</span>
                        <span>Rp. {{ number_format($delivery,2)}}</span>
                    </p>
                    <hr>
                    <p class="d-flex total-price">
                        <span>Total</span>
                        <span>Rp. {{ number_format($subtotal + $delivery,2)}}</span>
                    </p>
                </div>
                <a href="/" class="btn btn-primary py-3 px-5">Add Cart</a>
                @guest
                    <a href="" class="btn btn-warning py-3 px-4 float-right"
                       data-toggle="modal"
                       data-target="#login">Proceed to Checkout
                    </a>
                @else
                    <a href="/customer/order/{{ Auth::user()->id }}/{{$list->session_id ?? ''}}"
                       class="btn btn-primary py-3 px-4 float-right {{$list->session_id ?? 'disabled'}}">Proceed to Checkout</a>
                @endguest
            </div>
        </div>
    </div>

@endsection
