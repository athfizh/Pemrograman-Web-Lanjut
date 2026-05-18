<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\IconEntry;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

class ProductInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Product Tabs')
                    // Latihan No.3: Ubah tampilan menjadi vertical
                    ->tabPosition('start')
                    ->tabs([
                        // Latihan No.4: Icon berbeda pada tiap tab
                        Tab::make('Product Info')
                            ->icon('heroicon-o-academic-cap') // icon berbeda #1
                            ->schema([
                                TextEntry::make('name')
                                    ->label('Product Name')
                                    ->weight('bold')
                                    ->color('primary'),

                                TextEntry::make('id')
                                    ->label('Product ID'),

                                TextEntry::make('sku')
                                    ->label('Product SKU')
                                    ->badge()
                                    ->color('success'),

                                TextEntry::make('description')
                                    ->label('Product Description'),

                                TextEntry::make('created_at')
                                    ->label('Product Creation Date')
                                    ->date('d M Y')
                                    ->color('info'),
                            ])
                            ->columnSpanFull(),

                        Tab::make('Pricing & Stock')
                            ->icon('heroicon-o-currency-dollar') // icon berbeda #2
                            // Latihan No.1: Badge dinamis berdasarkan jumlah stok
                            ->badge(fn($record) => $record?->stock ?? 0)
                            // Latihan No.2: Warna badge berbeda berdasarkan jumlah stok
                            ->badgeColor(fn($record) => match (true) {
                                ($record?->stock ?? 0) > 10 => 'success', // hijau: stok banyak
                                ($record?->stock ?? 0) > 5 => 'warning', // kuning: stok sedang
                                default => 'danger',  // merah: stok sedikit
                            })
                            ->schema([
                                TextEntry::make('price')
                                    ->label('Price')
                                    ->icon('heroicon-o-currency-dollar'),

                                TextEntry::make('stock')
                                    ->label('Stock'),
                            ])
                            ->columnSpanFull(),

                        Tab::make('Media & Status')
                            ->icon('heroicon-o-photo') // icon berbeda #3
                            ->schema([
                                ImageEntry::make('image')
                                    ->label('Product Image')
                                    ->disk('public'),

                                IconEntry::make('is_active')
                                    ->label('Active')
                                    ->boolean(),

                                IconEntry::make('is_featured')
                                    ->label('Featured')
                                    ->boolean(),
                            ])
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
