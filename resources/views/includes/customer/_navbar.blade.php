<div class="py-1 bg-primary">
    <div class="container">
        <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
            <div class="col-lg-12 d-block">
                <div class="row d-flex">
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span
                                class="icon-phone2"></span></div>
                        <span class="text">(0274)777333</span>
                    </div>
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span
                                class="icon-paper-plane"></span></div>
                        <span class="text">layanan_vegefood@vegefood.com</span>
                    </div>
                    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
                        <span class="text">Jaminan Pengantaran Pesanan 1 - 2 Hari</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="/">Vegefoods</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        @guest
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a href="/" class="nav-link">Selamat Datang Di Vegefoods Kami Siap Melayani Anda  <span class="text">{{$session_id}}</span></a></li>
                    <li class="nav-item active">
                        <a href="{{ route('login') }}"
                           class="nav-link"
                           data-toggle="modal"
                           data-target="#login">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item active">
                        <a href="{{ route('login') }}"
                           class="nav-link"
                           data-toggle="modal"
                           data-target="#register">{{ __('Register') }}</a>
                    </li>
                    <li class="nav-item cta cta-colored">
                        <a href="/cart/{{$session_id}}" class="nav-link">
                            @if($qty ?? '' > 0)
                                <span class="icon-shopping_cart"></span>[<b>{{$qty ?? ''}}</b>]
                            @else
                                <span class="icon-shopping_cart"></span>[<b>0</b>]
                            @endif
                        </a>
                    </li>

                </ul>
            </div>
        @else

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item cta cta-colored">
                        <a href="/" class="nav-link">Selamat Datang Kembali </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle"
                           href="#" id="dropdown04"
                           data-toggle="dropdown"
                           aria-haspopup="true"
                           aria-expanded="false"><b>{{ Auth::user()->name }}</b></a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
                            <a class="dropdown-item" href="/customer/account/{{ Auth::user()->id }}/{{ Auth::user()->id }}">
                                <span class="icon-user mr-3"></span>My Account</a>

                            <a class="dropdown-item" href="/customer/order-list/{{ Auth::user()->id }}/{{ Auth::user()->id }}">
                                <span class="icon-dashboard2 mr-3"></span>My Order</a>

                            <a class="dropdown-item" href="/customer/list-whislist/{{ Auth::user()->id }}/{{ Auth::user()->id }}">
                                <span class="icon-list mr-3"></span>Wishlist
                                @if($qty_whislist ?? '' >0 )
                                    <span class="badge badge-info ml-5">{{$qty_whislist}}</span>
                                @else
                                    <span class="badge badge-info ml-5">0</span>
                                @endif

                            </a>
                            <div class="dropdown-divider bg-primary"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                                <span class="icon-sign-out mr-3"></span>{{ __('Logout') }}
                            </a>
                        </div>
                    </li>

                    <li class="nav-item cta cta-colored">
                        <a href="/cart/{{ Auth::user()->remember_token ?? $session_id}}" class="nav-link">
                            @if($qty ?? '' > 0)
                                <span class="icon-shopping_cart"></span>[<b>{{$qty ?? ''}}</b>]
                            @else
                                <span class="icon-shopping_cart"></span>[<b>0</b>]
                            @endif
                        </a>
                    </li>
                </ul>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        @endguest
    </div>
</nav>
<!-- END nav -->
<!-- Modal Login -->
<form method="POST" action="{{ route('login') }}">
    <div class="modal fade" id="login" data-backdrop="static" data-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="staticBackdropLabel">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="email">{{ __('E-Mail Address') }}</label>
                        <input id="email"
                               type="email"
                               class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{ old('email') }}"
                               required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password"
                               type="password"
                               class="form-control @error('password') is-invalid @enderror"
                               name="password"
                               required autocomplete="current-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="/reset-password">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="text" name="remember_token" value="{{$session_id ?? ''}}">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </div>
        </div>
    </div>
</form>


<form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="modal fade" id="register" data-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="staticBackdropLabel">{{ __('Register') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">{{ __('Name') }}</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                               name="name"
                               value="{{ old('name') }}"
                               required autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email"
                               class="form-control @error('email') is-invalid @enderror"
                               name="email"
                               value="{{ old('email') }}"
                               required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label for="password">{{ __('Password') }}</label>
                        <input id="password" type="password"
                               class="form-control @error('password') is-invalid @enderror"
                               name="password" required
                               autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password-confirm">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm"
                               type="password"
                               class="form-control"
                               name="password_confirmation"
                               required autocomplete="new-password">
                        <input type="hidden" id="rule" name="rule" value="1">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="remember_token" value="{{$session_id ?? ''}}">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">{{ __('Register') }}</button>
                </div>
            </div>
        </div>
    </div>
</form>
