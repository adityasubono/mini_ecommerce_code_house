@extends('layouts.main')

@section('title', 'Selamat Datang Di Situs E-commerce Mini')

@section('content')
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-3 pb-3">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <span class="subheading">Welcome to Vegefoods website</span>
                    <h2 class="mb-4">Find Featured Products Here</h2>
                    <p>Hi, find it in the search for quality raw materials and guaranteed freshness </p>

                    <form action="/find" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" class="form-control"
                                   placeholder="Find Your Favorite Product Here..."
                                   aria-label="Recipient's username"
                                   aria-describedby="button-addon2"
                                   name="find">
                            <select id="category"
                                    name="category"
                                    class="form-control"
                                    data-live-search="true"
                                    title="Category Product">
                                <option selected> -- Select to Category Product --</option>

                            </select>
                            <div class="input-group-append">
                                <button class="btn btn-outline-success" type="submit" id="button-addon2"><i class="icon icon-search mr-2"></i>Find</button>
                                <button class="btn btn-outline-success" type="submit" id="button-addon2"><i class="icon icon-refresh2 mr-2"></i>Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach($product as $data)
                    @if($data->discount >0)
                        <?php
                        if ($data->discount > 0) {
                            $discont = $data->discount / 100;
                            $total_discont = $data->price - ($data->price * $discont);
                        }
                        ?>

                        <div class="col-md-6 col-lg-3 ftco-animate">
                            <div class="product">
                                <a href="/show/{{$data->slug}}" class="img-prod">
                                    <img class="img-fluid"
                                         src="{{ asset('assets/uploads/images/'.$data->category_id.'/'.$data->image) }}"
                                         alt="{{$data->name}}" style="width: 350px; height: 250px">
                                    <span class="status">{{$data->discount}}%</span>

                                    <div class="overlay"></div>
                                </a>
                                <div class="text py-3 pb-4 px-3 text-center">
                                    <h3><a href="#">{{$data->name}} <br>
                                            <small class="text-info">Masih Tersedia {{$data->stock}} Lagi</small></a>
                                    </h3>
                                    <div class="d-flex">
                                        <div class="pricing">
                                            <p class="price">
                                                <span
                                                    class="mr-2 price-dc">Rp. {{ number_format($data->price, 2) }}</span>
                                                <span
                                                    class="price-sale">Rp. {{ number_format($total_discont, 2) }}</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="bottom-area d-flex px-3">
                                        <div class="m-auto d-flex">

                                            <a href="/show/{{$data->slug}}"
                                               class="buy-now d-flex justify-content-center align-items-center mx-1">
                                                <span><i class="ion-ios-cart"></i></span>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-md-6 col-lg-3 ftco-animate">
                            <div class="product">
                                <a href="/show/{{$data->slug}}" class="img-prod">
                                    <img class="img-fluid"
                                         src="{{ asset('assets/uploads/images/'.$data->category_id.'/'.$data->image) }}"
                                         alt="{{$data->name}}"
                                         style="width: 350px; height: 250px">
                                    <div class="overlay"></div>
                                </a>
                                <div class="text py-3 pb-4 px-3 text-center">
                                    <h3><a href="#">{{$data->name}}<br><small class="text-info">Masih
                                                Tersedia {{$data->stock}} Lagi</small></a></h3>
                                    <div class="d-flex">
                                        <div class="pricing">
                                            <p class="price">
                                                <span class="price-sale">Rp. {{ number_format($data->price, 2) }}</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="bottom-area d-flex px-3">
                                        <div class="m-auto d-flex">

                                            <a href="/show/{{$data->slug}}"
                                               class="buy-now d-flex justify-content-center align-items-center mx-1">
                                                <span><i class="ion-ios-cart"></i></span>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
@endsection
