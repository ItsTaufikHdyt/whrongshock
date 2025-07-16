<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubDistrictResource\Pages;
use App\Filament\Resources\SubDistrictResource\RelationManagers;
use App\Models\SubDistrict;
use App\Models\District;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SubDistrictResource extends Resource
{
    protected static ?string $model = SubDistrict::class;
    protected static ?string $pluralLabel = 'Kelurahan';

    protected static ?string $navigationIcon = 'heroicon-o-globe-americas';
    protected static ?string $navigationGroup = 'System';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make([
                    Forms\Components\Grid::make(1)->schema([
                        Forms\Components\Select::make('district_id')
                            ->label('Kecamatan')
                            ->required()
                            ->options(fn () => District::pluck('name', 'id'))
                            ->searchable(),
                        Forms\Components\TextInput::make('name')
                            ->label('Kelurahan')
                            ->required()
                            ->maxLength(100),
                    ]),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('district.name')
                    ->label('Kecamatan')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Kelurahan')
                    ->sortable()
                    ->searchable(),
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
            'index' => Pages\ListSubDistricts::route('/'),
            'create' => Pages\CreateSubDistrict::route('/create'),
            'edit' => Pages\EditSubDistrict::route('/{record}/edit'),
        ];
    }
}
