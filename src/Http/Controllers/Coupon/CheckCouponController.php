<?php

declare(strict_types=1);

namespace Mortezaa97\Coupons\Http\Controllers\Coupon;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mortezaa97\Coupons\Models\Coupon;
use Mortezaa97\Orders\Models\Order;

class CheckCouponController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Coupon $coupon)
    {
        // check usage2
        $is_used = Order::where('coupon_id', $coupon->id)
            ->count();
        if (! $coupon->usage && $is_used) {
            return response()->json(['کد تخفیف قبلا استفاده شده است.'], 400);
        }

        if ($coupon->expired_at) {
            if (Carbon::now() > $coupon->expired_at) {
                return response()->json(['زمان استفاده از کد تخفیف به اتمام رسیده است'], 400);
            }
        }

        if (! isset($request->is_service)) {
            $cart = Auth::guard('api')->user()->active_cart;
            $cart->update([
                'coupon_id' => $coupon->id,
            ]);
        }

        if ($coupon->percentage) {
            if (! isset($request->is_service)) {
                $amount = $cart->total_price * ($coupon->percentage / 100);
                if ($coupon->max_percentage_amount > $amount) {
                    return response()->json(['type' => $coupon->type, 'amount' => $coupon->amount, 'cart' => $cart->refresh()]);
                } else {
                    return $coupon->max_percentage_amount;
                }
            } else {
                return response()->json(['نوع کد وارد شده صحیح نیست'], 400);
            }
        } elseif ($coupon->amount) {
            if (isset($request->is_service)) {
                return response()->json(['type' => $coupon->type, 'amount' => $coupon->amount]);
            }

            return response()->json(['type' => $coupon->type, 'amount' => $coupon->amount, 'cart' => $cart->refresh()]);
        } else {
            return response()->json(['نوع کد وارد شده صحیح نیست'], 400);
        }
    }
}
