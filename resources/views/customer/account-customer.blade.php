@extends('layouts.main')

@section('title', 'Selamat Datang Di Situs E-commerce Mini')

@section('content')

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 ftco-animate fadeInUp ftco-animated">
                    <form action="/customer/account-update" class="billing-form" method="post">
                        @csrf
                        @method('patch')
                        <h3 class="mb-4 billing-heading">Account Customer </h3>
                        <div class="row align-items-end">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Full Name</label>
                                    <input type="hidden"
                                           class="form-control"
                                           name="id"
                                           id="id"
                                           placeholder="Full Name"
                                           value="{{$user->id}}">

                                    <input type="hidden"
                                           class="form-control"
                                           name="session_id"
                                           id="session_id"
                                           placeholder="Full Name"
                                           value="{{$session_id}}">

                                    <input type="text"
                                           class="form-control"
                                           name="name"
                                           id="name"
                                           placeholder="Full Name"
                                           value="{{$user->name}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email"
                                           class="form-control"
                                           name="email"
                                           id="email"
                                           placeholder="Email"
                                           value="{{$user->email}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="handphone">Handphone</label>
                                    <input type="number"
                                           class="form-control"
                                           name="handphone"
                                           id="handphone"
                                           placeholder="Number Handphone"
                                           value="{{$user->handphone}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="dob">Date of birth</label>
                                    <input type="date"
                                           class="form-control"
                                           name="dob"
                                           id="dob"
                                           placeholder="Date of birth"
                                           value="{{$user->dob}}">
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <div class="select-wrap">
                                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                        <select name="gender" id="gender" class="form-control">
                                            <option value="{{$user->gender}}">{{$user->gender}}</option>
                                            <option value="Female">Female</option>
                                            <option value="Male">Male</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea class="form-control" name="address" id="address" placeholder="Enter..." rows="3">{{$user->address}}</textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary py-3 px-4">Save</button>
                        </div>
                    </form><!-- END -->
                </div>
                <div class="col-xl-5">
                    <div class="row mt-5 pt-3">
                        <div class="col-md-12 d-flex mb-5">
                            <div class="cart-detail cart-total p-3 p-md-4 bg-light">
                                <h3 class="billing-heading mb-4">Detail Data</h3>
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
                    </div>
                </div> <!-- .col-md-8 -->
            </div>
        </div>
    </section>
@endsection
