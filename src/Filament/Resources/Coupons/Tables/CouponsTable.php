<?php

declare(strict_types=1);

namespace Mortezaa97\Coupons\Filament\Resources\Coupons\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Mortezaa97\Coupons\Models\Coupon;

class CouponsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                \App\Filament\Components\Table\CodeTextColumn::create(),
                \App\Filament\Components\Table\NameTextColumn::create(),
                \App\Filament\Components\Table\TypeTextColumn::create(),
                \App\Filament\Components\Table\AmountTextColumn::create(),
                \App\Filament\Components\Table\PercentageTextColumn::create(),
                \App\Filament\Components\Table\MaxPercentageAmountTextColumn::create(),
                \App\Filament\Components\Table\ExpiredAtTextColumn::create(),
                \App\Filament\Components\Table\StatusTextColumn::create(Coupon::class),
                \App\Filament\Components\Table\CreatedByTextColumn::create(),
                \App\Filament\Components\Table\UpdatedByTextColumn::create(),
                \App\Filament\Components\Table\DeletedAtTextColumn::create(),
                \App\Filament\Components\Table\CreatedAtTextColumn::create(),
                \App\Filament\Components\Table\UpdatedAtTextColumn::create(),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
