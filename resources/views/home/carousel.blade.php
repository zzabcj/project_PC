<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel" style="z-index: -999">
    <div class="carousel-inner">
{{--        <div class="carousel-item active">--}}
{{--            <img src="https://3dcomputer.vn/uploads/images/slide/banner-danh-muc/pc-gaming.png" class="d-block w-100 img-fluid" alt="...">--}}
{{--        </div>--}}
{{--        <div class="carousel-item">--}}
{{--            <img src="https://3dcomputer.vn/uploads/images/slide/banner-danh-muc/de-muc-do-hoa-co-ban.jpg" class="d-block w-100 img-fluid" alt="">--}}
{{--        </div>--}}
{{--        <div class="carousel-item">--}}
{{--            <img src="https://cdn.shopify.com/s/files/1/0228/7629/1136/files/accbanner_2000x.png?v=1586283657" class="d-block w-100 img-fluid" alt="">--}}
{{--        </div>--}}
        @php $i = 1; @endphp
        @foreach($banner as $bn)
            <div class="carousel-item {{ $i == '1' ? 'active' : '' }}">
                @php $i++; @endphp
                <img src="{{ asset('uploads/banner/'.$bn->image) }}" class="d-block w-100 img-fluid" alt="...">
            </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
