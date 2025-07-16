<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WasteItemResource\Pages;
use App\Filament\Resources\WasteItemResource\RelationManagers;
use App\Models\WasteItem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WasteItemResource extends Resource
{
    protected static ?string $model = WasteItem::class;
    protected static ?string $pluralLabel = 'Daftar Harga Limbah';

    protected static ?string $navigationIcon = 'heroicon-o-list-bullet';
    protected static ?string $navigationGroup = 'Bank Sampah';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make([
                Forms\Components\Grid::make(2)
                        ->schema([
                            Forms\Components\TextInput::make('category')
                                ->label('Kategori Limbah')
                                ->required(),
                            Forms\Components\Select::make('output')
                            ->options([
                                'Kompos' => 'Kompos',
                                'Kriya' => 'Kriya',
                            ])
                            ->label('Output')
                            ->required(),
                        ]),
                Forms\Components\Grid::make(2)
                        ->schema([
                            Forms\Components\Select::make('unit')
                            ->options([
                                'Kilogram (Kg)' => 'Kilogram (Kg)',
                                'Gram (g)' => 'Gram (g)',
                            ])
                            ->label('Satuan')
                            ->required(),
                            Forms\Components\TextInput::make('price')
                                ->numeric()
                                ->prefix('Rp')
                                ->label('Harga')
                                ->required(),
                        ]),

                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('category')
                    ->label('Kategori Limbah')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('output')
                    ->label('Output')
                    ->sortable()
                    ->searchable(), 
                Tables\Columns\TextColumn::make('unit')
                    ->label('Satuan')
                    ->sortable()
                    ->searchable(), 
                Tables\Columns\TextColumn::make('price')
                    ->label('Satuan')
                    ->sortable()
                    ->searchable()
                    ->formatStateUsing(fn($state) => $state !== null ? 'Rp ' . number_format($state, 0, '', '.') : ''), 
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListWasteItems::route('/'),
            'create' => Pages\CreateWasteItem::route('/create'),
            'edit' => Pages\EditWasteItem::route('/{record}/edit'),
        ];
    }
}
