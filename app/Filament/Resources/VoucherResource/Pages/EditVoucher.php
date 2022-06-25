<?php

namespace App\Filament\Resources\VoucherResource\Pages;

use App\Filament\Resources\VoucherResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVoucher extends EditRecord
{
    protected static string $resource = VoucherResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function beforeFill()
    {
        if ($this->record->payments()->exists()) {
            $this->notify('danger', 'You cannot edit the voucher after it has been used');

            $this->redirect($this->getResource()::getUrl('index'));
        }
    }
}
