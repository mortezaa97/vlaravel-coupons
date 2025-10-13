<?php

declare(strict_types=1);

namespace Mortezaa97\Coupons\Filament\Resources\Coupons\Schemas;

use Filament\Schemas\Schema;
use Mortezaa97\Coupons\Models\Coupon;

class CouponForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            \Filament\Schemas\Components\Group::make()
                ->schema([
                    \Filament\Schemas\Components\Section::make()
                        ->schema([
                            \App\Filament\Components\Form\NameTextInput::create()->required(),
                            \App\Filament\Components\Form\CodeTextInput::create()->required(),
                            \App\Filament\Components\Form\TypeSelect::create(Coupon::class)->required(),
                            \App\Filament\Components\Form\DescriptionTextarea::create(),
                            \App\Filament\Components\Form\AmountTextInput::create(),
                            \App\Filament\Components\Form\PercentageTextInput::create(),
                            \App\Filament\Components\Form\MaxPercentageAmountTextInput::create(),
                            \App\Filament\Components\Form\ExpiredAtDateTimePicker::create(),
                        ])
                        ->columns(12)
                        ->columnSpan(12),
                ])
                ->columns(12)
                ->columnSpan(8),
            \Filament\Schemas\Components\Group::make()
                ->schema([
                    \Filament\Schemas\Components\Section::make()
                        ->schema([
                            \App\Filament\Components\Form\StatusSelect::create(Coupon::class),
                            \App\Filament\Components\Form\CreatedBySelect::create()->required(),
                            \App\Filament\Components\Form\UpdatedBySelect::create(),
                        ])
                        ->columns(12)
                        ->columnSpan(12),
                ])
                ->columns(12)
                ->columnSpan(4),
        ])
            ->columns(12);
    }
}
