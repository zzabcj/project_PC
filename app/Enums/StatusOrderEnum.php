<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class StatusOrderEnum extends Enum implements LocalizedEnum
{
    const CHOTHANHTOAN =   0;
    const DATHANHTOAN =   1;
    const DAGIAODVVC = 2;
    const DAGIAO = 3;
    const DAHUY = 4;
}
