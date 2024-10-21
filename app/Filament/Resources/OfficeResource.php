<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OfficeResource\Pages;
use App\Models\Office;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OfficeResource extends Resource
{
    protected static ?string $model = Office::class;

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationIcon = 'heroicon-o-office-building';

    public static function getGloballySearchableAttributes(): array
    {
        return ['name_en', 'name_kh', 'description_en', 'description_kh'];
    }

    public static function canDelete(Model $record): bool
    {
        return auth()->user()->role->name === 'Super Admin' || auth()->user()->id === $record->user_id;
    }

    public static function canEdit(Model $record): bool
    {
        return auth()->user()->role->name === 'Super Admin' || auth()->user()->role->name === 'Admin' || auth()->user()->id === $record->user_id;
    }

    public static function canDeleteAny(): bool
    {
        return auth()->user()->role->name === 'Super Admin';
    }

    public static function canForceDelete(Model $record): bool
    {
        return auth()->user()->role->name === 'Super Admin';
    }

    public static function canRestore(Model $record): bool
    {
        return auth()->user()->role->name === 'Super Admin' || auth()->user()->id === $record->user_id;
    }

    public static function canRestoreAny(): bool
    {
        return auth()->user()->role->name === 'Super Admin';
    }

    public static function canForceDeleteAny(): bool
    {
        return auth()->user()->role->name === 'Super Admin';
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'Name' => $record->name_en,
            'ឈ្មោះ' => $record->name_kh,
        ];
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('English Input')
                    ->schema([
                        Forms\Components\TextInput::make('name_en')
                            ->label('Office Name English')
                            ->required(),
                        Forms\Components\RichEditor::make('description_en')
                            ->label('English Description')
                            ->required(),
                    ])->columnSpan(1),
                Forms\Components\Section::make('Khmer Input')
                    ->schema([
                        Forms\Components\TextInput::make('name_kh')
                            ->label('Office Name Khmer')
                            ->required(),
                        Forms\Components\RichEditor::make('description_kh')
                            ->label('Khmer Description')
                            ->required(),
                    ])->columnSpan(1),
                Forms\Components\FileUpload::make('image')
                    ->label('Image Upload')
                    ->image()
                    ->enableOpen()
                    ->required()
                    ->columnSpan('full'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name_en')
                    ->label('English Name')
                    ->limit(25)
                    ->searchable(),
                Tables\Columns\TextColumn::make('name_kh')
                    ->label('Khmer Name')
                    ->limit(25)
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.name')->searchable()
                ->label('Owner'),
                Tables\Columns\ImageColumn::make('image')
                ->label('Image Upload'),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
                Filter::make('is_featured')->label('My Created')->query(fn (Builder $query): Builder => $query->where('user_id', '=', auth()->user()->id))
                    ->toggle(),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
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
            'index' => Pages\ListOffices::route('/'),
            'create' => Pages\CreateOffice::route('/create'),
            'view' => Pages\ViewOffice::route('/{record}'),
            'edit' => Pages\EditOffice::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
