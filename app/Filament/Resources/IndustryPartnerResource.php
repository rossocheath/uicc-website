<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IndustryPartnerResource\Pages;
use App\Models\IndustryPartner;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class IndustryPartnerResource extends Resource
{
    protected static ?string $model = IndustryPartner::class;

    protected static ?int $navigationSort = 6;

    protected static ?string $navigationIcon = 'heroicon-o-library';

    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'link'];
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
            'Name' => $record->name,
        ];
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Partner Name')
                ->required(),
                Forms\Components\TextInput::make('link')
                    ->label('Link Url')
                ->required(),
                Forms\Components\FileUpload::make('image')
                    ->label('Image upload')
                    ->image()
                    ->enableOpen()
                    ->columnSpan('full')
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable()
                ->label('Partner Name'),
                Tables\Columns\TextColumn::make('link')
                ->label('Link Url'),
                Tables\Columns\ImageColumn::make('image')
                ->label('Image Upload'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created Date')->date(),
                Tables\Columns\TextColumn::make('updated_at')
                ->label('Updated at')->since(),
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
            'index' => Pages\ListIndustryPartners::route('/'),
            'create' => Pages\CreateIndustryPartner::route('/create'),
            'view' => Pages\ViewIndustryPartner::route('/{record}'),
            'edit' => Pages\EditIndustryPartner::route('/{record}/edit'),
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
