<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Xác Nhận Đơn Hàng</title>
</head>
<body>
    <p>Xin chào {{ $order->name_receiver }}</p>
    <p>Minh Ấn Computer đã nhận được đơn hàng của bạn và đơn hàng của bạn đang được xử lý.</p>
    <table style="width: 800px; text-align: right">
        <thead>
            <tr>
                <th>Hình ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá</th>
            </tr>
        </thead>
        <tbody>
                @foreach($order->order_detail as $item)
                    <tr>
                        <td><img src="{{ asset('uploads/products/'.$item->product_image) }}" alt="" width="50" height="50"></td>
                        <td>{{ $item->product_name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ number_format($item->price) }}đ</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="4" style="font-size: 15px; border-top: 1px solid #ccc">Tên người nhận: {{ $order->name_receiver }}</td>
                </tr>
                <tr>
                    <td colspan="4" style="font-size: 15px">Địa chỉ người nhận: {{ $order->address_receiver }}</td>
                </tr>
                <tr>
                    <td colspan="4" style="font-size: 15px">Số điện thoại người nhận: {{ $order->phone_receiver }}</td>
                </tr>
                <tr>
    {{--                <td colspan="3" style="border-top: 1px solid #ccc"></td>--}}
                    <td colspan="4" style="font-size: 15px; font-weight: bold; border-top: 1px solid #ccc">Tổng cộng: {{ number_format($order->total_pay) }}đ</td>
                </tr>
                <tr>
    {{--                <td colspan="3"></td>--}}
                    <td colspan="4" style="font-size: 15px; font-weight: bold;">Phí vận chuyển: {{ number_format($order->shipping_price) }}đ</td>
                </tr>
                <tr>
    {{--                <td colspan="3"></td>--}}
                    <td colspan="4" style="font-size: 18px; font-weight: bold;">Tổng thanh toán: {{ number_format($order->total_pay + $order->shipping_price) }}đ</td>
                </tr>
        </tbody>
    </table>
</body>
</html>
