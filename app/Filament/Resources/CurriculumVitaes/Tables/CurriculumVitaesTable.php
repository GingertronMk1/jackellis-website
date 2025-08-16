<?php

namespace App\Filament\Resources\CurriculumVitaes\Tables;

use App\Models\CurriculumVitae;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CurriculumVitaesTable
{
    /**
     * @throws \Exception
     */
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('ID')->sortable(),
                TextColumn::make('created_at')->label('Created At')->sortable(),
                TextColumn::make('updated_at')->label('Updated At')->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make()->disabled(fn (CurriculumVitae $cv) => !is_null($cv->child))
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
