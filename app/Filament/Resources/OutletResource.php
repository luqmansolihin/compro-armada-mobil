<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OutletResource\Pages;
use App\Filament\Resources\OutletResource\RelationManagers;
use App\Models\Outlet;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OutletResource extends Resource
{
    protected static ?string $model = Outlet::class;

    protected static ?string $navigationIcon = 'heroicon-o-map-pin';
    protected static ?string $navigationGroup = 'Catalog & Services';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('address')
                            ->required()
                            ->maxLength(65535)
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('phone')
                            ->tel()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('whatsapp')
                            ->label('WhatsApp PIC / Outlet')
                            ->tel()
                            ->placeholder('e.g. 6281234567890 (Gunakan kode negara, tanpa spasi/karakter)')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('fax')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('url_address')
                            ->url()
                            ->required()
                            ->label('Google Maps Web Link')
                            ->maxLength(255),
                        Forms\Components\Textarea::make('url_embed_address')
                            ->required()
                            ->label('Google Maps Embed iframe source URL (e.g. https://www.google.com/maps/embed?...)')
                            ->maxLength(65535)
                            ->columnSpanFull(),
                        Forms\Components\Select::make('services')
                            ->multiple()
                            ->relationship('services', 'title')
                            ->preload()
                            ->columnSpanFull(),
                        Forms\Components\Repeater::make('operationalHours')
                            ->relationship('operationalHours')
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
                            ])
                            ->columnSpanFull()
                            ->label('Jam Operasional')
                            ->helperText('Tambahkan jam operasional untuk outlet ini.'),
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
                Tables\Columns\TextColumn::make('phone')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListOutlets::route('/'),
            'create' => Pages\CreateOutlet::route('/create'),
            'edit' => Pages\EditOutlet::route('/{record}/edit'),
        ];
    }
}
