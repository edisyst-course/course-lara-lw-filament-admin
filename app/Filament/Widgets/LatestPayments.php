<?php

namespace App\Filament\Widgets;

use App\Models\Payment;
use Closure;
use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class LatestPayments extends BaseWidget
{
    protected static ?int $sort = 2; //così lo posiziono per secondo nella dashboard
    protected int | string | array $columnSpan = 'full';
    protected static ?string $heading = 'Latest five Payments';

    protected function getTableQuery(): Builder
    {
        return Payment::with('product')->latest()->take(5);
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('created_at')
                ->label('Payment time'),
            Tables\Columns\TextColumn::make('total')
                ->money('eur'),
            Tables\Columns\TextColumn::make('product.name'),
        ];
    }

    // Disabilito la paginazione altrimenti non mi prende il valore di ->take(5)
    protected function isTablePaginationEnabled(): bool
    {
        return false;
    }
}
