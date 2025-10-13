<?php

declare(strict_types=1);

namespace Mortezaa97\Coupons\Filament\Resources\Coupons;

use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Mortezaa97\Coupons\Filament\Resources\Coupons\Pages\CreateCoupon;
use Mortezaa97\Coupons\Filament\Resources\Coupons\Pages\EditCoupon;
use Mortezaa97\Coupons\Filament\Resources\Coupons\Pages\ListCoupons;
use Mortezaa97\Coupons\Filament\Resources\Coupons\Schemas\CouponForm;
use Mortezaa97\Coupons\Filament\Resources\Coupons\Tables\CouponsTable;
use Mortezaa97\Coupons\Models\Coupon;
use UnitEnum;

class CouponResource extends Resource
{
    protected static ?string $model = Coupon::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedTicket;

    protected static ?string $recordTitleAttribute = 'کد تخفیف';

    protected static ?string $navigationLabel = 'کدهای تخفیف';

    protected static ?string $modelLabel = 'کد تخفیف';

    protected static ?string $pluralModelLabel = 'کدهای تخفیف';

    protected static string|null|UnitEnum $navigationGroup = 'فروش';

    public static function form(Schema $schema): Schema
    {
        return CouponForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CouponsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCoupons::route('/'),
            'create' => CreateCoupon::route('/create'),
            'edit' => EditCoupon::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
