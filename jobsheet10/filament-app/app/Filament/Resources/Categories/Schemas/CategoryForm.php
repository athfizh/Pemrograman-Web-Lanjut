<?php

namespace App\Filament\Resources\Categories\Schemas;

use App\Models\Category;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        $record = $schema->getLivewire()->getRecord();

        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(
                        table: Category::class,
                        column: 'slug',
                        ignorable: $record,
                    )
                    ->helperText('Slug harus unik, contoh: teknologi, olahraga'),
            ]);
    }
}
