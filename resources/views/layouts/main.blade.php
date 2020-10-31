<!DOCTYPE html>
<html lang="en" xmlns:https="http://www.w3.org/1999/xhtml">
{{-- Includes Head--}}
@include('includes.customer._head')
{{-- End Include Head--}}
<body class="goto-here">

{{-- Includes Navbar --}}
@include('includes.customer._navbar')
{{-- End Include Navbar--}}

{{-- Include Hero --}}
@include('includes.customer._hero')
{{-- End Include Hero --}}

{{-- Include Information --}}
@include('includes.customer._information')
{{-- End Include Information --}}
{!! Toastr::message() !!}
@yield('content')


{{-- Include Best Price --}}
{{--@include('includes.customer._bestprice')--}}
{{-- End Include Bes Price --}}

{{-- Include Testimoni --}}
{{--@include('includes.customer._testimoni')--}}
{{-- End Include Testimoni --}}

{{-- Include Footer --}}
@include('includes.customer._footer')
{{-- End Include Footer --}}





<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


<script src="{!! asset('assets/vegefoods/js/jquery.min.js')!!}"></script>
<script src="{!! asset('assets/vegefoods/js/jquery-migrate-3.0.1.min.js')!!}"></script>
<script src="{!! asset('assets/vegefoods/js/popper.min.js')!!}"></script>
<script src="{!! asset('assets/vegefoods/js/bootstrap.min.js')!!}"></script>
<script src="{!! asset('assets/vegefoods/js/jquery.easing.1.3.js')!!}"></script>
<script src="{!! asset('assets/vegefoods/js/jquery.waypoints.min.js')!!}"></script>
<script src="{!! asset('assets/vegefoods/js/jquery.stellar.min.js')!!}"></script>
<script src="{!! asset('assets/vegefoods/js/owl.carousel.min.js')!!}"></script>
<script src="{!! asset('assets/vegefoods/js/jquery.magnific-popup.min.js')!!}"></script>
<script src="{!! asset('assets/vegefoods/js/aos.js')!!}"></script>
<script src="{!! asset('assets/vegefoods/js/jquery.animateNumber.min.js')!!}"></script>
<script src="{!! asset('assets/vegefoods/js/bootstrap-datepicker.js')!!}"></script>
<script src="{!! asset('assets/vegefoods/js/scrollax.min.js')!!}"></script>
<script src="{!! asset('assets/vegefoods/js/google-map.js')!!}"></script>
<script src="{!! asset('assets/vegefoods/js/main.js')!!}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
</body>
</html>
