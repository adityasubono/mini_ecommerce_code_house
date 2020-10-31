@if($page_name == "home_page")
    <section id="home-section" class="hero">
        <div class="home-slider owl-carousel">
            <div class="slider-item" style="background-image: url('{{asset('assets/vegefoods/images/bg_1.jpg')}}');">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
                        <div class="col-md-12 ftco-animate text-center">
                            <h1 class="mb-2">We serve Fresh Vegestables &amp; Fruits</h1>
                            <h2 class="subheading mb-4">We deliver organic vegetables &amp; fruits</h2>
                            <p><a href="#" class="btn btn-primary">View Details</a></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="slider-item" style="background-image: url('{{asset('assets/vegefoods/images/bg_2.jpg')}}');">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

                        <div class="col-sm-12 ftco-animate text-center">
                            <h1 class="mb-2">100% Fresh &amp; Organic Foods</h1>
                            <h2 class="subheading mb-4">We deliver organic vegetables &amp; fruits</h2>
                            <p><a href="#" class="btn btn-primary">View Details</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@else
    <div class="hero-wrap hero-bread" style="background-image:url('{{asset('assets/vegefoods/images/bg_1.jpg')}}');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    @if($page_name == "detail_product")
                        <h1 class="mb-0 bread">Detail Product</h1>
                    @elseif($page_name == "cart_list")
                        <h1 class="mb-0 bread">My Cart List </h1>
                    @elseif($page_name == "whislist")
                        <h1 class="mb-0 bread">My Whislist</h1>
                    @elseif($page_name == "login_customer")
                        <h1 class="mb-0 bread">Login Customer</h1>
                    @elseif($page_name == "checkout")
                        <h1 class="mb-0 bread">Checkout</h1>
                    @elseif($page_name == "account_customer")
                        <h1 class="mb-0 bread">My Account Customer</h1>
                    @elseif($page_name == "end_checkout")
                        <h1 class="mb-0 bread">Thank You </h1>
                    @elseif($page_name == "my_order")
                        <h1 class="mb-0 bread">My Order </h1>
                    @elseif($page_name == "reset_password")
                        <h1 class="mb-0 bread">Reset Password </h1>
                    @endif

                </div>
            </div>
        </div>
    </div>

@endif
