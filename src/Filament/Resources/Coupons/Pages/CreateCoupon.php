<?php

declare(strict_types=1);

namespace Mortezaa97\Coupons\Filament\Resources\Coupons\Pages;

use Filament\Resources\Pages\CreateRecord;
use Mortezaa97\Coupons\Filament\Resources\Coupons\CouponResource;

class CreateCoupon extends CreateRecord
{
    protected static string $resource = CouponResource::class;
}
