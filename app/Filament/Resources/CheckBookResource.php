<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\CheckBook;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\Summarizers\Average;
use App\Filament\Resources\CheckBookResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CheckBookResource\RelationManagers;


class CheckBookResource extends Resource
{
    protected static ?string $model = CheckBook::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->options(User::all()->pluck('name', 'id'))
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('book_id')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('book.title')
                    ->searchable(),
            ])
            ->filters([
                // CheckBook filter
                SelectFilter::make('id')
                    ->options(
                        CheckBook::all()->pluck('user.name', 'id')
                    )
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListCheckBooks::route('/'),
            'create' => Pages\CreateCheckBook::route('/create'),
            'edit' => Pages\EditCheckBook::route('/{record}/edit'),
        ];
    }

    // override the method to show auth user data 
    // public static function getEloquentQuery(): Builder
    // {

    //     return parent::getEloquentQuery()->where('user_id', Auth::id())->orderBy('id', 'desc');
    // }
}
