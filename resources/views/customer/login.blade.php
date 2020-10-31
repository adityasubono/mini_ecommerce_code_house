@extends('layouts.main')

@section('title', 'Selamat Datang Di Situs E-commerce Mini')

@section('content')
    <div class="cart-total mb-3">
        <h3>Login</h3>
        <form action="#" class="info">
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" class="form-control text-left px-3" placeholder="">
            </div>
            <div class="form-group">
                <label for="country">Password</label>
                <input type="password" name="password" class="form-control text-left px-3" placeholder="">
            </div>
            <a href="checkout.html" class="btn btn-primary py-3 px-4">Login</a>
            <a href="checkout.html" class="btn btn-primary py-3 px-4">Register</a>
            <a href="checkout.html" class="btn btn-primary py-3 px-4">Forgot Password</a>
        </form>
    </div>
@endsection
