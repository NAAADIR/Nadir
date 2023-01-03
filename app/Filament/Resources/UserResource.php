<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Resources\Pages\Page;
use Filament\Forms\Components\Card;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Pages\CreateRecord;
use Filament\Tables\Columns\BooleanColumn;
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UserResource\RelationManagers;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Select::make('address_id')
                        ->relationship('address', 'street')
                        ->required(),
                    TextInput::make('lastname')
                        ->required()
                        ->maxLength(255),
                    TextInput::make('firstname')
                        ->required()
                        ->maxLength(255),
                    TextInput::make('username')
                        ->required()
                        ->maxLength(255),
                    TextInput::make('gender')
                        ->required()
                        ->maxLength(5),
                    TextInput::make('phone_office')
                        ->required()
                        ->maxLength(255),
                    TextInput::make('phone_mobile')
                        ->required()
                        ->maxLength(255),
                    TextInput::make('email')
                        ->label('Email Address')
                        ->required()
                        ->maxLength(255),
                    TextInput::make('password')
                        ->password()
                        ->required(fn(Page $livewire): bool => $livewire instanceof CreateRecord)
                        ->minLength(8)
                        ->dehydrated(fn ($state) => filled($state))
                        ->dehydrateStateUsing(fn ($state) => Hash::make($state)),
                    TextInput::make('role')
                        ->required(),
                        
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->sortable(),
                TextColumn::make('address.street')
                    ->sortable(),
                TextColumn::make('lastname')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('firstname')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('username')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('gender')
                    ->sortable(),
                TextColumn::make('phone_office')
                    ->sortable(),
                TextColumn::make('phone_mobile')
                    ->sortable(),
                TextColumn::make('email')
                    ->sortable(),
                TextColumn::make('password')
                    ->sortable(),
                TextColumn::make('role')
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }    
}
