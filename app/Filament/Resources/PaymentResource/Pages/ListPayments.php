<?php

namespace App\Filament\Resources\PaymentResource\Pages;

use App\Filament\Resources\PaymentResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\View\View;

class ListPayments extends ListRecords
{
    protected static string $resource = PaymentResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getTableContentFooter(): ?View
    {
//        $subtotal = money($this->getTableRecords()->sum('subtotal')); // non funge se lo porto nella view

        return \view('filament/paymwents/footer' ); // lo creo normalmente dentro resources/views
    }
}
