@extends('layout.master')
@section('content')
    <div class="FAQ">
        <div class="container py-5 vh-100">
            <h1>Những câu hỏi thường gặp?</h1>
            <div class="tab">
                <input type="radio" name="acc" id="acc1">
                <label for="acc1">
                    <h2>01</h2>
                    <h3>Shop bán những sản phẩm nào?</h3>
                </label>
                <div class="content">
                    <p class="fs-5">Trang web chúng tôi chuyên cung cấp các sản phẩm về PC gaming, laptop hoặc các thiết bị văn phòng khác, tại đây mọi người có thể tha hồ lựa chọn những món đồ ngon bổ rẻ với mức giá phù hợp cho tất cả mọi người.</p>
                </div>
            </div>
            <div class="tab">
                <input type="radio" name="acc" id="acc2">
                <label for="acc2">
                    <h2>02</h2>
                    <h3>Sản phẩm được giao như thế nào?</h3>
                </label>
                <div class="content">
                    <p class="fs-5">Sau khi bạn đặt hàng, bên công ty chúng tôi sẽ tiếp nhận đơn hàng của bạn và đóng gói, sau đó sẽ được vận chuyển tới tay bạn trong khoảng từ 4 đến 7 ngày làm việc. Nếu quý khách ở gần có thể tới trực tiếp tiệm của chúng tôi để được tư vấn và lắp ráp tận nhà.</p>
                </div>
            </div>
            <div class="tab">
                <input type="radio" name="acc" id="acc3">
                <label for="acc3">
                    <h2>03</h2>
                    <h3>Chính sách bảo hành?</h3>
                </label>
                <div class="content">
                    <p class="fs-5">Nếu sản phẩm của bạn trong quá trình vận chuyển xảy ra lỗi, hãy liên hệ ngay với bộ phận chăm sóc khách hàng để được hướng dẫn xử lý. Sản phẩm của bạn sẽ được đổi trả trong vòng 7 ngày nếu có vấn đề với sản phẩm. Sau khi mua hàng bên cửa hàng chúng tôi, quý khách sẽ được hưởng ưu đãi 12 tháng bảo hành nếu bị hư hỏng trong quá trình sử dụng.</p>
                </div>
            </div>
            <div class="tab">
                <input type="radio" name="acc" id="acc4">
                <label for="acc4">
                    <h2>04</h2>
                    <h3>Khách hàng được hưởng những ưu đãi gì?</h3>
                </label>
                <div class="content">
                    <p class="fs-5">Khi quý khách mua hàng trực tuyến trên web hoặc trực tiếp tại shop sẽ được nhận voucher giảm giá 200k khi mua sản phẩm tại shop trong lần mua kế tiếp, ngoài ra sau khi mua PC hoặc Laptop, quý khách sẽ được cài win miễn phí và vệ sinh máy miễn phí trong vòng 1 năm sau khi mua máy.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
