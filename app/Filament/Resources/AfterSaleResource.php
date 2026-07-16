<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AfterSaleResource\Pages;
use App\Filament\Resources\AfterSaleResource\RelationManagers;
use App\Models\AfterSale;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AfterSaleResource extends Resource
{
    protected static ?string $model = AfterSale::class;

    protected static ?string $navigationIcon = 'heroicon-o-shield-check';
    protected static ?string $navigationGroup = 'Catalog & Services';
    protected static ?string $navigationLabel = 'Purna Jual';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (Forms\Set $set, ?string $state, ?AfterSale $record) => $set('slug', \App\Traits\HasUniqueSlug::generateUniqueSlug($state, AfterSale::class, $record?->id))),
                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->unique(AfterSale::class, 'slug', ignoreRecord: true)
                            ->maxLength(255),
                        Forms\Components\FileUpload::make('image')
                            ->image()
                            ->directory('uploads')
                            ->helperText('Rekomendasi ukuran: 800 x 600 px (Rasio 4:3)')
                            ->fetchFileInformation(false)
                            ->required(),
                        Forms\Components\Toggle::make('status')
                            ->default(true)
                            ->required(),
                        Forms\Components\RichEditor::make('content')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\Hidden::make('user_id')
                            ->default(fn () => auth()->id()),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->circular(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\IconColumn::make('status')
                    ->boolean()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAfterSales::route('/'),
            'create' => Pages\CreateAfterSale::route('/create'),
            'edit' => Pages\EditAfterSale::route('/{record}/edit'),
        ];
    }
}
