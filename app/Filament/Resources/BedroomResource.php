<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Bedroom;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\BedroomResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\BedroomResource\RelationManagers;

class BedroomResource extends Resource
{
    protected static ?string $model = Bedroom::class;

    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static ?string $navigationGroup = 'Bedroom Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Select::make('hotel_id')
                        ->relationship('hotel', 'name')
                        ->required(),
                    Select::make('bedroom_type_id')
                        ->relationship('bedroomtype', 'name')
                        ->required(),
                    TextInput::make('name')
                        ->required()
                        ->maxLength(255),
                    TextInput::make('phone_bedroom')
                        ->required()
                        ->maxLength(255),
                    TextInput::make('price')
                        ->required()
                        ->maxLength(5),
                    FileUpload::make('image'),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->sortable(),
                TextColumn::make('hotel.name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('bedroomtype.name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('phone_bedroom')
                    ->sortable(),
                TextColumn::make('price')
                    ->sortable(),
                TextColumn::make('image')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListBedrooms::route('/'),
            'create' => Pages\CreateBedroom::route('/create'),
            'edit' => Pages\EditBedroom::route('/{record}/edit'),
        ];
    }    
}
