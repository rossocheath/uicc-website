<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactResource\Pages;
use App\Models\Contact;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static ?string $navigationIcon = 'heroicon-o-inbox-in';

    protected static ?int $navigationSort = 7;

    protected static ?string $navigationGroup = 'User Site';

    protected static function getNavigationBadge(): ?string
    {
        return Contact::query()->where('status', 'NEW')->count();
    }

    public static function canCreate(): bool
    {
        return auth()->user() === null;
    }

    public static function canEdit(Model $record): bool
    {
        return auth()->user() === null;
    }

    public static function canDelete(Model $record): bool
    {
        return auth()->user()->role->name === 'Super Admin' || auth()->user()->role->name === 'Admin';
    }

    public static function canDeleteAny(): bool
    {
        return auth()->user()->role->name === 'Super Admin';
    }

    public static function canForceDelete(Model $record): bool
    {
        return auth()->user()->role->name === 'Super Admin';
    }

    public static function canForceDeleteAny(): bool
    {
        return auth()->user()->role->name === 'Super Admin';
    }

    public static function canRestore(Model $record): bool
    {
        return auth()->user()->role->name === 'Super Admin';
    }

    public static function canRestoreAny(): bool
    {
        return auth()->user()->role->name === 'Super Admin';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('name'),
                        Forms\Components\TextInput::make('email'),
                        Forms\Components\TextInput::make('phone'),
                        Forms\Components\TextInput::make('subject'),
                        Forms\Components\Textarea::make('message')
                            ->columnSpan('full'),
                    ])->columns(2),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('phone')->searchable(),
                Tables\Columns\TextColumn::make('email')->searchable(),
                //                TextColumn::make('status')->sortable()->label(__('status'))
                //                    ->formatStateUsing(fn (string $state): string => __("{$state}")),
                BadgeColumn::make('status')
                    ->colors([
                        'warning' => 'NEW',
                        'success' => 'READ',
                    ]),
                Tables\Columns\TextColumn::make('message')->limit(30),
            ])->defaultSort('id', 'DESC')
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\RestoreAction::make(),
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
            'index' => Pages\ListContacts::route('/'),
            'create' => Pages\CreateContact::route('/create'),
            'view' => Pages\ViewContact::route('/{record}'),
            'edit' => Pages\EditContact::route('/{record}/edit'),
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
