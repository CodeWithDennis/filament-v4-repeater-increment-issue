<?php

declare(strict_types=1);

namespace App\Filament\Resources\Items;

use App\Filament\Resources\Items\Pages\CreateItem;
use App\Filament\Resources\Items\Pages\EditItem;
use App\Filament\Resources\Items\Pages\ListItems;
use App\Filament\Resources\Items\Pages\ViewItem;
use App\Filament\Resources\Items\Schemas\ItemForm;
use App\Filament\Resources\Items\Tables\ItemsTable;
use App\Models\Item;
use BackedEnum;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Repeater\TableColumn;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

final class ItemResource extends Resource
{
    protected static ?string $model = Item::class;

    protected static BackedEnum|string|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function getNavigationBadgeColor(): string|array|null
    {
        return 'gray';
    }

    public static function getNavigationBadge(): ?string
    {
        return (string) self::$model::query()->count();
    }

    public static function form(Schema $schema): Schema
    {
        return ItemForm::configure($schema)
            ->columns(1)
            ->schema([
                TextInput::make('name')
                    ->required(),
                Repeater::make('orders')
                    ->relationship('orders')
                    ->table([
                        TableColumn::make('ID'),
                        TableColumn::make('Name'),
                        TableColumn::make('Email'),
                    ])
                    ->schema([
                        //                        TextEntry::make('id'),
                        TextInput::make('id')
                            ->disabled()
                            ->required(),
                        TextInput::make('name')
                            ->required(),
                        TextInput::make('email')
                            ->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return ItemsTable::configure($table);
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
            'index' => ListItems::route('/'),
            'create' => CreateItem::route('/create'),
            'view' => ViewItem::route('/{record}'),
            'edit' => EditItem::route('/{record}/edit'),
        ];
    }
}
