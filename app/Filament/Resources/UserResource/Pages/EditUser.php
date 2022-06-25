<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getActions(): array
    {
        return [
//            Actions\DeleteAction::make(), // impedisco il delete anche qui
            Actions\Action::make('changePassword')
                ->form([
                    TextInput::make('new_password')
                        ->password()
                        ->label('New Password')
                        ->required()
                        ->rule(Password::default()), // regole di default per le passw
                    TextInput::make('new_password_confirmation')
                        ->password()
                        ->label('Confirm New Password')
                        ->required()
                        ->rule(Password::default())
                        ->same('new_password'),
                ])
            ->action(function (array $data) {
                $this->record->update([
                    'password' => Hash::make($data['new_password'])
                ]);
                $this->notify('success', 'Password updated successfully');
            })
        ];
    }
}
