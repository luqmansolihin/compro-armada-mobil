<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OperationalHourResource\Pages;
use App\Filament\Resources\OperationalHourResource\RelationManagers;
use App\Models\OperationalHour;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OperationalHourResource extends Resource
{
    protected static ?string $model = OperationalHour::class;

    protected static ?string $navigationIcon = 'heroicon-o-clock';
    protected static ?string $navigationGroup = 'Settings & Info';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('day_from')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('e.g. Senin'),
                Forms\Components\TextInput::make('day_to')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('e.g. Jumat'),
                Forms\Components\TimePicker::make('open_time')
                    ->required(),
                Forms\Components\TimePicker::make('close_time')
                    ->required(),
                Forms\Components\Hidden::make('user_id')
                    ->default(fn () => auth()->id()),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('day_from')->sortable(),
                Tables\Columns\TextColumn::make('day_to')->sortable(),
                Tables\Columns\TextColumn::make('open_time'),
                Tables\Columns\TextColumn::make('close_time'),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageOperationalHours::route('/'),
        ];
    }
}
