<?php

declare(strict_types=1);

namespace App\Filament\Resources\Items\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

final class ItemInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
