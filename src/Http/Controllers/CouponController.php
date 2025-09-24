<?php

declare(strict_types=1);

namespace Mortezaa97\Coupons\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Mortezaa97\Coupons\Http\Resources\CouponResource;
use Mortezaa97\Coupons\Models\Coupon;

class CouponController extends Controller
{
    public function index()
    {
        Gate::authorize('viewAny', Coupon::class);

        return CouponResource::collection(Coupon::all());
    }

    public function store(Request $request)
    {
        Gate::authorize('create', Coupon::class);
        try {
            DB::beginTransaction();
            DB::commit();
        } catch (Exception $exception) {
            return response()->json($exception->getMessage(), 419);
        }

        return new CouponResource($coupon);
    }

    public function show(Coupon $coupon)
    {
        Gate::authorize('view', $coupon);

        return new CouponResource($coupon);
    }

    public function update(Request $request, Coupon $coupon)
    {
        Gate::authorize('update', $coupon);
        try {
            DB::beginTransaction();
            DB::commit();
        } catch (Exception $exception) {
            return response()->json($exception->getMessage(), 419);
        }

        return new CouponResource($coupon);
    }

    public function destroy(Coupon $coupon)
    {
        Gate::authorize('delete', $coupon);
        try {
            DB::beginTransaction();
            DB::commit();
        } catch (Exception $exception) {
            return response()->json($exception->getMessage(), 419);
        }

        return response()->json('با موفقیت حذف شد');
    }
}
