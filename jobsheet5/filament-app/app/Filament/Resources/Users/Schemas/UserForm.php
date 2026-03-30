<?php

namespace App\Filament\Resources\Users\Schemas;

use App\Models\User;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Illuminate\Validation\Rules\Password;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        $record = $schema->getLivewire()->getRecord();

        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255)
                    ->unique(
                        table: User::class,
                        column: 'email',
                        ignorable: $record,
                    ),

                TextInput::make('password')
                    ->password()
                    ->required()
                    ->minLength(6)
                    ->rule(Password::min(6)),
            ]);
    }
}
