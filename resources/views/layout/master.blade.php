<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="icon" href="<%= BASE_URL %>favicon.ico">

    <meta name="description" content="{{ $meta_description }}"/>
    <link rel="canonical" href="{{ $meta_url }}" >

    <meta name="robots" content="index,follow" />
    <meta name="keywords" content="{{ $meta_keyword }}"/>

    <link href="{{ asset('css/bootstrap.min.css') }} " rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/jquery-3.6.1.min.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="//cdn.ckeditor.com/4.20.0/full/ckeditor.js"></script>
    <title>{{ $title }} | Minh Ấn Computer</title>
</head>
<body onload="LoadDone()">

<div class="wrapper">

    <div class="bg-white w-100 position-fixed top-0 left-0 d-flex align-items-center justify-content-center" id="loading-bg" style="height: 100%; z-index: 999">
        <div class="loadingio-spinner-ripple-w6pak872t0e"><div class="ldio-ca5zawbnz89">
                <div></div><div></div>
            </div></div>
    </div>
    {{--    navbar--}}
    @include('layout.navbar')
    <div class="content">
            @yield('content')
    </div>
    {{--        footer--}}
    @include('layout.footer')
    <div class="position-fixed top-50 translate-middle" style="left:93vw; z-index:998;">
        <a href="">
            <i class="fa-brands fa-facebook-f bg-primary text-white fs-4 text-center rounded-circle mb-2" style="width: 50px; height: 50px; line-height: 50px"></i>
        </a>
        <a href="">
            <i class="fa-brands fa-shopify bg-danger text-white fs-4 text-center rounded-circle mb-2" style="width: 50px; height: 50px; line-height: 50px"></i>
        </a>
        <a href="">
            <i class="fa-regular fa-envelope bg-info text-white fs-4 text-center rounded-circle mb-2" style="width: 50px; height: 50px; line-height: 50px"></i>
        </a>
        <a href="">
            <i class="fa-solid fa-phone bg-primary text-white fs-4 text-center rounded-circle mb-2" style="width: 50px; height: 50px; line-height: 50px"></i>
        </a>
    </div>
    <!-- Messenger Chat Plugin Code -->
    <div id="fb-root"></div>

    <!-- Your Chat Plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
        var chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", "108240172011793");
        chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml            : true,
                version          : 'v15.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
</div>

<script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script>
    @if (session('status'))
        let timerInterval
        Swal.fire({
            html: '{{ session('status') }}!',
            timer: 2000,
            icon: 'info',
            willClose: () => {
                clearInterval(timerInterval)
            }
        })
    @endif
</script>
</body>
</html>
