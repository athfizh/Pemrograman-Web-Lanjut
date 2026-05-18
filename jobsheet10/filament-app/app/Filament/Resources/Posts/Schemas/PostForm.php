<?php

namespace App\Filament\Resources\Posts\Schemas;

use App\Models\Post;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Group::make([

                    // Section A: Post Details — icon pensil
                    Section::make('Post Details')
                        ->description('Fill in the details of the post')
                        ->icon(Heroicon::OutlinedPencilSquare)
                        ->schema([
                            Group::make([
                                TextInput::make('title')
                                    ->required()
                                    ->rules('min:5|max:100')
                                    ->validationMessages([
                                        'min' => 'Judul minimal harus 5 karakter.',
                                        'required' => 'Judul tidak boleh kosong.',
                                    ]),

                                TextInput::make('slug')
                                    ->required()
                                    ->rules('min:3')
                                    ->unique()
                                    ->validationMessages([
                                        'unique' => 'Slug sudah digunakan, pilih yang lain.',
                                        'min' => 'Slug minimal harus 3 karakter.',
                                        'required' => 'Slug tidak boleh kosong.',
                                    ]),

                                Select::make('category_id')
                                    ->relationship('category', 'name')
                                    ->required()
                                    ->preload()
                                    ->searchable(),

                                ColorPicker::make('color'),
                            ])->columns(2),

                            MarkdownEditor::make('body')
                                ->columnSpanFull(),
                        ]),

                    // Section B: Image Upload — icon foto
                    Section::make('Image Upload')
                        ->icon(Heroicon::OutlinedPhoto)
                        ->schema([
                            FileUpload::make('image')
                                ->required()
                                ->disk('public')
                                ->directory('posts'),
                        ]),

                ])->columnSpan(2),

                // J.1 — Meta kanan (1/3)
                Group::make([

                    // Section C: Meta Information — icon tag
                    Section::make('Meta Information')
                        ->icon(Heroicon::OutlinedTag)
                        ->schema([
                            TagsInput::make('tags')
                                ->placeholder('New tag'),

                            Checkbox::make('published'),

                            DateTimePicker::make('published_at'),
                        ]),

                ])->columnSpan(1),

            ])->columns(3);
    }
}
