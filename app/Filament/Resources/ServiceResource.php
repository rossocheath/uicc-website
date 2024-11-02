<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Models\Service;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?int $navigationSort = 5;

    protected static ?string $navigationIcon = 'heroicon-o-key';

    public static function getGloballySearchableAttributes(): array
    {
        return ['name_en', 'name_kh', 'serviceDetail.detail_en', 'serviceDetail.detail_kh'];
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
                Forms\Components\Card::make([
                    Forms\Components\TextInput::make('name_en')
                        ->label('Service English Name')
                        ->required(),
                    Forms\Components\TextInput::make('name_kh')
                        ->label('Service Khmer Name')
                        ->required(),
                    Forms\Components\RichEditor::make('detail_en')
                        ->label('Service English detail')
                        ->required(),
                    Forms\Components\RichEditor::make('detail_kh')
                        ->label('Service Khmer detail')
                        ->required(),
                ])->columns(2),
                Forms\Components\FileUpload::make('image')
                    ->label('Image Upload')
                    ->image()
                    ->enableOpen()
                    ->required()
                    ->columnSpan('full'),
                //                Forms\Components\Card::make([
                //                    Forms\Components\Repeater::make('serviceDetail')
                //                        ->label('Service Detail')
                //                        ->relationship()
                //                        ->schema([
                //                            Forms\Components\TextInput::make('detail_en')
                //                                ->label('English Detail')
                //                                ->columnSpan(1)
                //                                ->required(),
                //                            Forms\Components\TextInput::make('detail_kh')
                //                                ->label('Khmer Detail')
                //                                ->columnSpan(1)
                //                                ->required(),
                //                        ])
                //                        ->defaultItems(1)
                //                        ->columns(2)
                //                        ->columnSpan('full'),
                //                ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name_en')
                    ->label('English Name')
                    ->searchable()
                    ->limit(15),
                Tables\Columns\TextColumn::make('name_kh')
                    ->label('Khmer name')
                    ->searchable()
                    ->limit(15),
                Tables\Columns\ImageColumn::make('image')
                    ->label('Image Upload'),
                Tables\Columns\TextColumn::make('detail_en')
                    ->label('English Service Detail')
                    ->limit(15),
                Tables\Columns\TextColumn::make('detail_kh')
                    ->label('Khmer Service Detail')
                    ->limit(15),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Owner'),

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
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'view' => Pages\ViewService::route('/{record}'),
            'edit' => Pages\EditService::route('/{record}/edit'),
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
