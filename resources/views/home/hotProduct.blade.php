<div class="container my-5">
    <div class="row text-center">
        @foreach($event as $ev)
            <div class="col-md-6 px-5 py-3">
                <div class="border">
                    <img src="{{ asset('uploads/banner/'.$ev->image) }}" loading="crazy" class="img-fluid">
                </div>
            </div>
        @endforeach
    </div>
</div>
