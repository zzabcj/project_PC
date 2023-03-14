    <div class="sidebar border">
        <h3 class="px-4 py-2">Lọc sản phẩm</h3>
        <hr>
        <div class="form-group px-2">
            <p>
                <label for="amount">Tầm giá:</label>
                <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                <input type="hidden" name="start_price" id="start_price" value="{{ $val_min }}">
                <input type="hidden" name="end_price" id="end_price" value="{{ $val_max }}">
            </p>

            <div id="slider-range"></div>
        </div>
        <hr>
        <h4 class="ps-3">Thiết bị</h4>
        <div class="form-group px-5 pb-3">
            @foreach($categories_brand as $category)
                <div class="form-check p-1">
                    <input class="form-check-input category_brand" type="checkbox" name="category_device[]" value="{{ $category->id }}"
                           @if(request()->category_device)
                            @foreach(request()->category_device as $id)
                               {{
                                    $category->id == $id ? 'checked' : ''
                                }}
                           @endforeach
                            @endif
                    >
                    <label class="form-check-label fs-6">{{ $category->title }}</label>
                </div>
            @endforeach
        </div>
        <hr>
        <h4 class="ps-3">Hãng</h4>
        <div class="form-group px-5 pb-3">
            @foreach($categories_type as $category)
                <div class="form-check p-1">
                    <input class="form-check-input category_type" type="checkbox" name="category_brand[]" value="{{ $category->id }}"
                        @if(request()->category_brand)
                            @foreach(request()->category_brand as $id)
                                {{
                                     $category->id == $id ? 'checked' : ''
                                 }}
                            @endforeach
                        @endif
                    >
                    <label class="form-check-label fs-6">{{ $category->title }}</label>
                </div>
            @endforeach
        </div>
    </div>
    <button class="btn btn-primary w-100 my-3" type="submit">Lọc</button>
<script>
    $(document).ready(function (){
           $( "#slider-range" ).slider({
               range: true,
               min: {{ $min_price }},
               max: {{ $max_price }},
               step: 10000,
               values: [ {{ $val_min }}, {{ $val_max }} ],
               slide: function( event, ui ) {
                   $( "#amount" ).val( ui.values[ 0 ].toLocaleString('vn') + " đ - " + ui.values[ 1 ].toLocaleString('vn') + " đ" );
                   $("#start_price").val(ui.values[ 0 ]);
                   $("#end_price").val(ui.values[ 1 ]);

               }
           });
           $( "#amount" ).val( $( "#slider-range" ).slider( "values", 0 ).toLocaleString('vn') +
               " đ - " + $( "#slider-range" ).slider( "values", 1 ).toLocaleString('vn') + " đ");
    });
</script>
