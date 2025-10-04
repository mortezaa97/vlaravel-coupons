<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Mortezaa97\Coupons\Http\Controllers\Coupon\CheckCouponController;
use Mortezaa97\Coupons\Http\Controllers\CouponController;

Route::prefix('api')->middleware('api')->group(function () {
    Route::get('coupons', [CouponController::class, 'index'])->name('coupons.index');
    Route::get('coupons/{coupon}', [CouponController::class, 'show'])->name('coupons.show');
    Route::post('coupons-check/{coupon:code}', CheckCouponController::class)->middleware('auth:api')->name('coupons.check');
});
