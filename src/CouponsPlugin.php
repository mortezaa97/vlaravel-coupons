<?php

declare(strict_types=1);

namespace Mortezaa97\Coupons;

use Filament\Contracts\Plugin;
use Filament\Panel;

class CouponPlugin implements Plugin
{
    public static function make(): static
    {
        return app(static::class);
    }

    public function getId(): string
    {
        return 'coupons';
    }

    public function register(Panel $panel): void
    {
        $panel
            ->resources([
//                'AddressResource' => AddressResource::class,
            ]);
    }

    public function boot(Panel $panel): void
    {
        //
    }
}
