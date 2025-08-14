<?php

namespace App\Filament\Resources\CVS\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class CVForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Textarea::make('body')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
