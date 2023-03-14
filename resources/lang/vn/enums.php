<?php

use App\Enums\StatusOrderEnum;

return [

    StatusOrderEnum::class => [
        StatusOrderEnum::CHOTHANHTOAN => 'Chờ thanh toán',
        StatusOrderEnum::DATHANHTOAN => 'Đã thanh toán',
        StatusOrderEnum::DAGIAODVVC => 'Đã giao cho đơn vị vận chuyển',
        StatusOrderEnum::DAGIAO => 'Giao hàng thành công',
        StatusOrderEnum::DAHUY => 'Đã huỷ',
    ],

];
