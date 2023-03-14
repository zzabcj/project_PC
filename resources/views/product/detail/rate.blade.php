<div class="text-bg-light">
    <div class="container mt-5 py-5">
        <h2>Đánh giá người dùng</h2>
        <input type="hidden" value="{{ $productDetail->slug }}" class="slug-product">
        <hr>
        <div class="total-rate border">
            <div class="row">
                <div class="col-md-3 text-center my-auto">
                    <span class="fs-1 text-warning">
                        {{ $rating }}
                        <i class="fa-solid fa-star"></i>
                    </span>
                    <p>{{ $productDetail->reviews->count() }} đánh giá</p>
                </div>
                <div class="vr p-0"></div>
                <div class="col-md-8 p-4">
                    <div class="row">
                        <div class="col-2">
                            5 <i class="fa-solid fa-star"></i>
                        </div>
                        <div class="col-8 mt-1">
                            <div class="progress">
                                <div class="progress-bar bg-warning"
                                     role="progressbar"
                                     aria-label="Warning example"
                                     style="width: {{ $rating_5_width }}%"
                                     aria-valuenow=""
                                     aria-valuemin="0"
                                     aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="col-2">
                            ({{ $productDetail->reviews->where('star',5)->count() }})
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            4 <i class="fa-solid fa-star"></i>
                        </div>
                        <div class="col-8 mt-1">
                            <div class="progress">
                                <div class="progress-bar bg-warning"
                                     role="progressbar"
                                     aria-label="Warning example"
                                     style="width:{{ $rating_4_width }}%"
                                     aria-valuenow="0"
                                     aria-valuemin="0"
                                     aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="col-2">
                            ({{ $productDetail->reviews->where('star',4)->count() }})
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            3 <i class="fa-solid fa-star"></i>
                        </div>
                        <div class="col-8 mt-1">
                            <div class="progress">
                                <div class="progress-bar bg-warning"
                                     role="progressbar"
                                     aria-label="Warning example"
                                     style="width:{{ $rating_3_width }}%"
                                     aria-valuenow="0"
                                     aria-valuemin="0"
                                     aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="col-2">
                            ({{ $productDetail->reviews->where('star',3)->count() }})
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            2 <i class="fa-solid fa-star"></i>
                        </div>
                        <div class="col-8 mt-1">
                            <div class="progress">
                                <div class="progress-bar bg-warning"
                                     role="progressbar"
                                     aria-label="Warning example"
                                     style="width:{{ $rating_2_width }}%"
                                     aria-valuenow="0"
                                     aria-valuemin="0"
                                     aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="col-2">
                            ({{ $productDetail->reviews->where('star',2)->count() }})
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            1 <i class="fa-solid fa-star"></i>
                        </div>
                        <div class="col-8 mt-1">
                            <div class="progress">
                                <div class="progress-bar bg-warning"
                                     role="progressbar"
                                     aria-label="Warning example"
                                     style="width:{{ $rating_1_width }}%"
                                     aria-valuenow="0"
                                     aria-valuemin="0"
                                     aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="col-2">
                            ({{ $productDetail->reviews->where('star',1)->count() }})
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="user-rate my-5" style="max-height: 500px; overflow-y: scroll">
            @if($productDetail->reviews->count())
{{--            vong lap --}}
            @foreach($reviews as $review)
                <div class="reviewList">
                    <div class="p-4 d-flex">
                        <div class="ms-4">
                            <span>{{ $review->user_name }} - </span><span style="opacity: .6">{{ $review->created_at->format('d-m-Y') }}</span><br>
                            @switch($review->star)
                                @case(1)
                                    <i class="fa-solid fa-star text-warning"></i>
                                    @break
                                @case(2)
                                    <i class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-solid fa-star text-warning"></i>
                                    @break
                                @case(3)
                                    <i class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-solid fa-star text-warning"></i>
                                    @break
                                @case(4)
                                    <i class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-solid fa-star text-warning"></i>
                                    @break
                                @default
                                    <i class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-solid fa-star text-warning"></i>
                            @endswitch
                            <br>
                            <p>{{ $review->review }}</p>
                        </div>
                    </div>
                    <hr class="m-0">
                </div>
            @endforeach
            @else
            <h4 class="p-4">Sản phẩm chưa có đánh giá</h4>
            @endif
        </div>
{{--        @if($productDetail->reviews->count() > 3)--}}
{{--            <nav aria-label="Page navigation example" class="mt-3">--}}
{{--                <ul class="pagination justify-content-end">--}}
{{--                    <li class="page-item {{ $reviews->onFirstPage() ? 'disabled' : '' }}">--}}
{{--                        <a class="page-link" href="{{ $reviews->url(1) }}">Previous</a>--}}
{{--                    </li>--}}
{{--                    @for ($i = 1; $i <= $reviews->lastPage(); $i++)--}}
{{--                        <li class="page-item {{ ($reviews->currentPage() == $i) ? ' active' : '' }}">--}}
{{--                            <a class="page-link {{ $reviews->url($i) == $reviews->currentPage() ? 'active' : '' }}" id="switchPage" href="{{ $reviews->url($i) }}">{{ $i }}</a>--}}
{{--                        </li>--}}
{{--                    @endfor--}}
{{--                    <li class="page-item {{ $reviews->currentPage() == $reviews->lastPage() ? 'disabled' : '' }}">--}}
{{--                        <a class="page-link" href="{{ $reviews->url($reviews->currentPage()+1) }}">Next</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </nav>--}}
{{--        @endif--}}
        <form action="{{ route('Rating') }}" method="post">
            @csrf
            <p class="ms-2 mt-2 fs-4">Đánh giá sản phẩm</p>
            <input type="hidden" value="{{ $productDetail->id }}" name="product_id">
            <fieldset>
                <span class="star-cb-group">
                    <input type="radio" id="rating-5" name="rating" value="5" checked="checked" /><label for="rating-5">5</label>
                    <input type="radio" id="rating-4" name="rating" value="4" /><label for="rating-4">4</label>
                    <input type="radio" id="rating-3" name="rating" value="3" /><label for="rating-3">3</label>
                    <input type="radio" id="rating-2" name="rating" value="2" /><label for="rating-2">2</label>
                    <input type="radio" id="rating-1" name="rating" value="1" /><label for="rating-1">1</label>
                </span>
            </fieldset>
            <div class="form-floating mt-2">
                <textarea class="form-control" placeholder="Leave a comment here" id="comment" name="review" style="height: 100px"></textarea>
                <label for="comment">Gửi bình luận</label>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-primary" type="submit">Gửi</button>
            </div>
        </form>
    </div>
</div>
