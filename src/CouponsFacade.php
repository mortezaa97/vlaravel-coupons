<?php

namespace Mortezaa97\Coupons;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Mortezaa97\Coupons\Skeleton\SkeletonClass
 */
class CouponsFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'coupons';
    }
}
