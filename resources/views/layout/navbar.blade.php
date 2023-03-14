@php use App\Models\Cart;use Illuminate\Support\Facades\Auth; @endphp
<header>
    <nav class="navbar px-3 text-bg-secondary">
        <div class="container">
            <div class="d-sm-block d-md-flex justify-content-center justify-content-between"
                 style="font-size: 14px;width:1320px">
                <div class="header-contact d-flex flex-wrap">
                    <div class="header-contact-phone ms-4">
                        <i class="fa-solid fa-phone text-danger"></i><span class="ms-2">0822.00.6661</span>
                    </div>
                    <div class="header-contact-mail ms-4">
                        <i class="fa-solid fa-envelope text-warning"></i><span class="ms-2">padao8a3@gmail.com</span>
                    </div>
                    <div class="header-contact-address ms-4">
                        <i class="fa-solid fa-location-dot text-primary"></i><span class="ms-2">Trái Đất</span>
                    </div>
                </div>
                <div class="header-authen d-flex">
                    @if(!Auth::user())
                        <div>
                            <a href="/Auth/Register" class="header-authen-register ms-4">
                                <i class="fa-solid fa-user-plus text-warning"></i><span class="ms-2 text-white">Đăng Ký</span>
                            </a>
                            <a href="/Auth/Login" class="header-authen-login ms-4">
                                <i class="fa-solid fa-user-check text-primary"></i><span class="ms-2 text-white">Đăng Nhập</span>
                            </a>
                        </div>
                    @endif
                    @if(Auth::user())
                        <div class="header-authen-user ms-4">
                            <div class="dropdown text-end">
                                <a href="#" class="d-block link-light text-decoration-none dropdown-toggle"
                                   data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-user"></i>
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu text-small">
                                    <li><a class="dropdown-item text-dark" href="#">Admin...</a></li>
                                    <li><a class="dropdown-item text-dark" href="/User/Order">Đơn hàng của tôi</a></li>
                                    <a class="dropdown-item text-dark" href="/User/ChangePassword">Đổi mật khẩu</a>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item text-dark" href="/Auth/Logout">Đăng xuất</a></li>
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </nav>
    <div class="navbar px-3 text-bg-dark">
        <div class="container">
            <div class="d-flex align-items-center justify-content-center justify-content-around flex-wrap"
                 style="width:1320px">
                <a href="/" class="text-center">
                    <img src="https://assets.topdev.vn/images/2021/12/13/TopDev-supercoderlogo3x-1639389409.png" alt=""
                         class="p-2 w-50">
                </a>
                <form class="search-form pb-lg-0 pb-4 position-relative" action="{{ route('product') }}">
                    <input type="text" class="header-input-select" placeholder="Bạn muốn tìm sản phẩm gì?" name="q" value="{{ request()->q }}" autocomplete="off">
                    <button type="submit" class="header-search-btn">Tìm kiếm</button>
                    <div class="search-item d-none position-absolute bg-white text-dark border border-1" style="width: calc(100% - 101px); max-height: 320px; overflow-y: scroll; overflow-x:hidden; z-index: 999;">

                    </div>
                </form>
                <a href="/Cart" class="cart text-center position-relative">
                    <i class="fa-solid fa-cart-shopping header-icon"></i>
                    <span class="d-block">
                            Giỏ hàng
                        </span>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger cart-quantity">
                            @php
                            if(Auth::user()){
                                echo Cart::where('user_id', Auth::user()->getAuthIdentifier())->count();
                            } else {
                                echo 0;
                            }
                            @endphp
                            <span class="visually-hidden">cart count</span>
                        </span>
                </a>
            </div>
        </div>
    </div>
    <div class="navbar px-3 text-bg-light">
        <div class="container">
            <div class="d-flex align-items-center justify-content-center justify-content-around flex-wrap">
                <a href="/" class="text-dark px-3 py-1 navbar-item {{ request()->routeIs('home') ? 'active' : '' }}">
                    Trang chủ
                </a>
                <a href="/Product"
                   class="text-dark px-3 py-1 navbar-item {{ request()->routeIs('product') ? 'active' : '' }}">
                    Sản phẩm
                </a>
                <a href="/About"
                   class="text-dark px-3 py-1 navbar-item {{ request()->routeIs('about') ? 'active' : '' }}">
                    Về chúng tôi
                </a>
                <a href="/FAQ" class="text-dark px-3 py-1 navbar-item {{ request()->routeIs('FAQ') ? 'active' : '' }}">
                    Câu hỏi thường gặp
                </a>
            </div>
        </div>
    </div>
    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
            aria-controls="offcanvasRight" hidden>Toggle right offcanvas
    </button>

    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasRightLabel">Offcanvas right</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            ...
        </div>
    </div>
</header>
<style>
    a {
        color: #FFF;
        text-decoration: none;
    }

    a:hover {
        color: #FFF;
    }
</style>
<script>
    $('.header-input-select').keyup(function (){
        var text = $(this).val()
        if(text != ''){
            $('.search-item').removeClass('d-none')
            $('.search-item').addClass('d-block');
        } else {
            $('.search-item').addClass('d-none');
            $('.search-item').removeClass('d-block')
        }
        $.ajax({
            url: '{{ url('LiveSearchProduct') }}'+ '/' + text,
            method: 'GET'
        }).done(function (html){
            $('.search-item').html(html);
        })
    })
</script>
