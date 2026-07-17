<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CareerResource\Pages;
use App\Filament\Resources\CareerResource\RelationManagers;
use App\Models\Career;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CareerResource extends Resource
{
    protected static ?string $model = Career::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';
    protected static ?string $navigationGroup = 'Content & Media';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (Forms\Set $set, ?string $state, ?Career $record) => $set('slug', \App\Traits\HasUniqueSlug::generateUniqueSlug($state, Career::class, $record?->id))),
                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\DatePicker::make('registration_from')
                            ->required(),
                        Forms\Components\DatePicker::make('registration_to')
                            ->required(),
                        Forms\Components\TextInput::make('minimal_age')
                            ->numeric()
                            ->required(),
                        Forms\Components\TextInput::make('maximal_age')
                            ->numeric()
                            ->required(),
                        Forms\Components\TextInput::make('recruiter_email')
                            ->email()
                            ->required()
                            ->label('Email Recruiter')
                            ->placeholder('e.g. recruitment@armada-mobil.co.id')
                            ->maxLength(255),
                        Forms\Components\Select::make('cities')
                            ->multiple()
                            ->relationship(
                                name: 'cities',
                                titleAttribute: 'name',
                                modifyQueryUsing: fn (Builder $query) => $query->has('outlets')
                            )
                            ->preload(),
                        Forms\Components\Toggle::make('status')
                            ->default(true)
                            ->required(),
                        Forms\Components\RichEditor::make('description')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\RichEditor::make('requirement')
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
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('registration_from')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('registration_to')
                    ->date()
                    ->sortable(),
                Tables\Columns\IconColumn::make('status')
                    ->boolean()
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
            'index' => Pages\ListCareers::route('/'),
            'create' => Pages\CreateCareer::route('/create'),
            'edit' => Pages\EditCareer::route('/{record}/edit'),
        ];
    }
}
