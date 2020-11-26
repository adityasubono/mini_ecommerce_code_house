@extends('layouts.main')

@section('title', 'Selamat Datang Di Situs E-commerce Mini')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 ftco-animate fadeInUp ftco-animated">
                <h3>My Whislist</h3>
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
                        @forelse($list_whislist as $list)
                            <tr class="text-center">
                                <td class="product-remove">
                                    <a href="/customer/delete-whislist/{{$list->id}}/{{Auth::user()->remember_token}}">
                                        <span class="ion-ios-trash mr-3 mb-3"></span>Delete
                                    </a><br>
                                    <a href="/customer/add-cart/{{$list->id}}/{{Auth::user()->remember_token}}">
                                        <span class="ion-ios-cart mr-3 mb-3"></span>Add Cart
                                    </a><br>
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
                                <td colspan="6"><h4 class="text-center text-danger">Whislist Empty</h4></td>
                            </tr>

                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
