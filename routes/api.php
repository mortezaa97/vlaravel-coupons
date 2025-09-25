<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Mortezaa97\Coupons\Http\Controllers\CouponController;
Route::prefix('api')->group(function () {
    Route::get('coupons', [CouponController::class, 'index'])->name('coupons.index');
    Route::get('coupons/{coupon}', [CouponController::class, 'show'])->name('coupons.show');
});
