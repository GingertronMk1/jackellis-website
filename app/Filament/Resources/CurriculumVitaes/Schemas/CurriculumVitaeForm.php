<?php

namespace App\Filament\Resources\CurriculumVitaes\Schemas;

use Filament\Forms\Components\MarkdownEditor;
use Filament\Schemas\Schema;

class CurriculumVitaeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                MarkdownEditor::make('body')->columnSpanFull(),
            ]);
    }
}
