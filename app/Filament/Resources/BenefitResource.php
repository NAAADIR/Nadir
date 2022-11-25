<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Benefit;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TimePicker;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\BenefitResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\BenefitResource\RelationManagers;

class BenefitResource extends Resource
{
    protected static ?string $model = Benefit::class;

    protected static ?string $navigationIcon = 'heroicon-o-gift';
    protected static ?string $navigationGroup = 'Benefit Management';
    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Select::make('bedroom_id')
                        ->relationship('bedroom', 'name')
                        ->required(),
                    Select::make('benefit_price_id')
                        ->relationship('benefitprice', 'name')
                        ->required(),
                    Select::make('user_id')
                        ->relationship('user', 'id')
                        ->required(),
                    TextInput::make('name')
                        ->required()
                        ->maxLength(255),
                    DatePicker::make('start_at')
                        ->required(),
                    DatePicker::make('end_at')
                        ->required(),
                    TimePicker::make('duration')
                        ->required(),
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
                TextColumn::make('bedroom.name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('benefitprice.name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('user.id')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('start_at')
                    ->sortable(),
                TextColumn::make('end_at')
                    ->sortable(),
                TextColumn::make('duration')
                    ->sortable(),
                TextColumn::make('image'),
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
            'index' => Pages\ListBenefits::route('/'),
            'create' => Pages\CreateBenefit::route('/create'),
            'edit' => Pages\EditBenefit::route('/{record}/edit'),
        ];
    }    
}
