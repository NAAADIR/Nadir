<?php

namespace App\Filament\Resources;

use DatePeriod;
use Filament\Forms;
use Filament\Tables;
use App\Models\Booking;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\BookingResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\BookingResource\RelationManagers;
use App\Filament\Resources\BookingResource\RelationManagers\UsersRelationManager;
use Filament\Tables\Columns\BooleanColumn;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Select::make('user_id')
                        ->relationship('user', 'name')
                        ->required(),
                    Select::make('bedroom_id')
                        ->relationship('bedrooms', 'name')
                        ->required(),
                    Select::make('payment_id')
                        ->relationship('payment', 'creditCardName')
                        ->required(),
                    DatePicker::make('start_at')
                        ->required(),
                    DatePicker::make('end_at')
                        ->required(),
                    DatePicker::make('payment_date')
                        ->required(),
                    TextInput::make('amount')
                        ->required()
                        ->maxLength(5),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->sortable(),
                TextColumn::make('user.name')
                    ->sortable(),
                TextColumn::make('payment.creditCardName')
                    ->sortable(),
                TextColumn::make('bedroom.name')
                    ->sortable(),
                TextColumn::make('start_at')
                    ->dateTime(),
                TextColumn::make('end_at')
                    ->dateTime(),
                TextColumn::make('payment_date')
                    ->dateTime(),
                TextColumn::make('amount')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()

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
            UsersRelationManager::class,
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBookings::route('/'),
            'create' => Pages\CreateBooking::route('/create'),
            'edit' => Pages\EditBooking::route('/{record}/edit'),
        ];
    }    
}
