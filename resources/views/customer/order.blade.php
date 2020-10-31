@extends('layouts.main')

@section('title', 'Selamat Datang Di Situs E-commerce Mini')

@section('content')
    <section class="ftco-section">
        <div class="container">
            <h3 class="mb-4 billing-heading">Billing Details</h3>
            <div class="cart-list">
                <table class="table">
                    <thead class="thead-primary">
                    <tr class="text-center">
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
                                           value="{{$list->qty}}" min="1" max="10" disabled>
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




            <div class="row justify-content-center">
                <div class="col-xl-6 ftco-animate fadeInUp ftco-animated">
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

                    <div class="cart-detail cart-total p-3 p-md-4 bg-light">
                        <h3 class="billing-heading mb-4">Detail Data Customer</h3>
                        <p class="d-flex">
                            <span>Full Name</span>
                            <span>{{$user->name}}</span>
                        </p>
                        <p class="d-flex">
                            <span>Email</span>
                            <span>{{$user->email}}</span>
                        </p>
                        <p class="d-flex">
                            <span>Number Handphone</span>
                            <span>{{$user->handphone}}</span>
                        </p>
                        <p class="d-flex">
                            <span>Date of birth</span>
                            <span>{{$user->dob}}</span>
                        </p>
                        <p class="d-flex">
                            <span>Address</span>
                            <span>{{$user->address}}</span>
                        </p>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="row mt-5 pt-3">
                        <div class="col-md-12">
                            <div class="cart-detail p-3 p-md-4">

                                <form action="/customer/order-save/{{$user->id}}/{{$session_id}}" method="post">
                                    @csrf

                                    <input type="hidden" name="user_id" value="{{$user->id}}">
                                    <input type="hidden" name="name" value="{{$user->name}}">
                                    <input type="hidden" name="phone" value="{{$user->handphone}}">
                                    <input type="hidden" name="address" value="{{$user->address}}">
                                    <input type="hidden" name="email" value="{{$user->email}}">
                                    <input type="hidden" name="subtotal" value="{{($subtotal + $delivery)}}">

                                    <h3 class="billing-heading mb-4">Payment Method</h3>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="radio">
                                                <label><input type="radio"
                                                              name="payment_method"
                                                              value=" Direct Bank Tranfer BCA"
                                                              class="mr-2 @error('payment_method') is-invalid @enderror">
                                                    Direct Bank Tranfer BCA Account Number 162-198291-9021 PT. Vegefoods Indonesia</label>
                                                @error('payment_method')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="radio">
                                                <label><input type="radio"
                                                              name="payment_method"
                                                              value=" Direct Bank Tranfer BNI"
                                                              class="mr-2 @error('payment_method') is-invalid @enderror">
                                                    Direct Bank Tranfer BNI Account Number 130-183781-2198 PT. Vegefoods Indonesia</label>
                                                @error('payment_method')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="radio">
                                                <label><input type="radio"
                                                              name="payment_method"
                                                              value=" Direct Bank Tranfer BRI"
                                                              class="mr-2 @error('payment_method') is-invalid @enderror">
                                                    Direct Bank Tranfer BRI Account Number 111-637279-9021 PT. Vegefoods Indonesia</label>
                                                @error('payment_method')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="radio">
                                                <label><input type="radio"
                                                              name="payment_method"
                                                              value=" Direct Bank Tranfer Mandiri"
                                                              class="mr-2 @error('payment_method') is-invalid @enderror">
                                                    Direct Bank Tranfer Mandiri Account Number 142-1091291-9111 PT. Vegefoods Indonesia</label>
                                                @error('payment_method')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="radio">
                                                <label><input type="radio"
                                                              name="payment_method"
                                                              value="Paypal"
                                                              class="mr-2 @error('payment_method') is-invalid @enderror"> Paypal</label>
                                                @error('payment_method')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <p><button type="submit" class="btn btn-primary py-3 px-4">Place an order</button></p>
                                </form>

                            </div>
                        </div>
                    </div>
                </div> <!-- .col-md-8 -->
            </div>
        </div>
    </section>

@endsection
