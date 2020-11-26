@extends('layouts.main')

@section('title', 'Selamat Datang Di Situs E-commerce Mini')

@section('content')


    <section class="ftco-section">
        <div class="container">
            <p class="breadcrumbs"><span class="mr-2"><a href="/">Home</a></span>
                / <span>{{$page_name}}</span></p>

            <div class="row">
                <div class="col-lg-4 mb-5 ftco-animate">
                    <a href="{!! asset('assets/uploads/images/'.$product->category_id.'/'.$product->image) !!}"
                       class="image-popup">
                        <img src="{!! asset('assets/uploads/images/'.$product->category_id.'/'.$product->image) !!}"
                             class="img-thumbnail img-fluid" alt="{{$product->name}}">
                    </a>
                </div>
                <div class="col-lg-8 product-details pl-md-5 ftco-animate">
                    <h3>{{$product->name}}</h3>
                    @if($product->discount >0)
                        <p class="text-info display-4" style="text-decoration: line-through">
                            Rp. {{ number_format($product->price, 2) }}</p>
                        <span class="text-danger text-bold">Discount {{$product->discount}}% </span>
                    @endif

                    <p class="price"><span>Rp. {{ number_format($total_discont, 2) }}/</span>
                        <small>{{$product->volume}}</small></p>
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                    <a class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                       data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Informasi Produk
                                    </a>
                                </h2>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                 data-parent="#accordionExample">
                                <div class="card-body">
                                    {{$product->info_product}}
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h2 class="mb-0">
                                    <a class="btn btn-link btn-block text-left collapsed" type="button"
                                       data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                       aria-controls="collapseTwo">
                                        Nutrisi dan Manfaat
                                    </a>
                                </h2>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                 data-parent="#accordionExample">
                                <div class="card-body">
                                    {{$product->benefits}}
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h2 class="mb-0">
                                    <a class="btn btn-link btn-block text-left collapsed" type="button"
                                       data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
                                       aria-controls="collapseThree">
                                        Cara Penyimpanan
                                    </a>
                                </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                 data-parent="#accordionExample">
                                <div class="card-body">
                                    {{$product->storage}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <form action="/cart/add-cart" class="subscribe-form" method="post">
                        @csrf
                        <div class="row mt-4">
                            <div class="w-100"></div>
                            <div class="input-group col-md-6 d-flex mb-3">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <button type="button" class="btn btn-danger btn-sm" id="minus-btn">-</button>
                                    </div>
                                    <input type="number" id="qty" name="qty" class="form-control form-control-sm"
                                           value="1"
                                           min="1" max="10">
                                    <div class="input-group-prepend">
                                        <button type="button" class="btn btn-success btn-sm" id="plus-btn">+</button>
                                    </div>
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-12">
                                <input type="hidden" name="remember_token" value="{{$session_id}}">
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <input type="hidden" name="category_id" value="{{$product->category_id}}">
                                <input type="hidden" name="slug" value="{{$product->slug}}">
                                <input type="hidden" name="price" value="{{$total_discont}}">
                                <input type="hidden" name="name" value="{{$product->name}}">
                                <input type="hidden" name="image" value="{{$product->image}}">
                                <p style="color: #000;">Stock : {{$product->stock}}</p>
                                <p style="color: #000;">Berat : {{$product->weight}}</p>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success bg-info">Add to Cart</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
        <div class="container py-4">
            <div class="row d-flex justify-content-center py-5">
                <div class="col-md-6">
                    <h2 style="font-size: 22px;" class="mb-0">Subcribe to our Newsletter</h2>
                    <span>Get e-mail updates about our latest shops and special offers</span>
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <form action="#" class="subscribe-form">
                        <div class="form-group d-flex">
                            <input type="text" class="form-control" placeholder="Enter email address">
                            <input type="submit" value="Subscribe" class="submit px-3">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
