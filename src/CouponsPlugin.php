<?php

declare(strict_types=1);

namespace Mortezaa97\Coupons;

use Filament\Contracts\Plugin;
use Filament\Navigation\NavigationGroup;
use Filament\Panel;
use Mortezaa97\Coupons\Filament\Resources\Coupons\CouponResource;

class CouponsPlugin implements Plugin
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
                CouponResource::class,
            ])->navigationGroups([
                NavigationGroup::make('پنل پیامکی')
                    ->icon('heroicon-o-phone')
                    ->collapsed(),
            ]);
    }

    public function boot(Panel $panel): void
    {
    }
}
