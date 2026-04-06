<?php

namespace App\Filament\Resources\Posts\Schemas;


use App\Models\Post;
use Filament\Schemas\Schema;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TagsInput;


class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                //
                TextInput::make("title")
                    ->minLength(5)
                    ->required(),

                TextInput::make("slug")
                    ->unique(table: Post::class, column: 'slug', ignorable: fn ($record) => $record)
                    ->required(),

                Select::make("category_id")
                    ->label('Category')
                    ->relationship("category", "name")
                    ->preload()
                    ->searchable(),

                ColorPicker::make('color'),

                MarkdownEditor::make('body'),

                FileUpload::make('image')
                    ->disk('public')
                    ->directory('posts'),

                TagsInput::make('tags')
                    ->placeholder('New tag'),

                Checkbox::make('published'),

                DateTimePicker::make('published_at'),
            ]);
    }
}
