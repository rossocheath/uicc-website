<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\ViewColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $navigationGroup = 'Settings';

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function can(string $action, ?Model $record = null): bool
    {
        return auth()->user()->role->name === 'Super Admin';
    }

    public static function canEdit(Model $record): bool
    {
        return auth()->user()->id !== $record->id;
    }

    public static function canGloballySearch(): bool
    {
        return auth()->user()->role->name === 'Super Admin';
    }

    public static function canDelete(Model $record): bool
    {
        return auth()->user()->id !== $record->id;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make([
                    Forms\Components\TextInput::make('name')
                        ->label('Full Name')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('email')
                        ->label('Email')
                        ->email()
                        ->required()
                        ->maxLength(255),
                    Forms\Components\Select::make('role_id')
                        ->label('Role Permission')
                        ->relationship('role', 'name')
                        ->required(),
                    Forms\Components\TextInput::make('password')
                        ->dehydrateStateUsing(fn($state) => Hash::make($state))
                        ->autocomplete(false)
                        ->password()
                        ->required()
                        ->minLength(8)
                        ->maxLength(255),
                ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ViewColumn::make('from')->view('filament.message-from')->sortable(['name'])->label(__('Users')),
                Tables\Columns\TextColumn::make('role.name')
                    ->label('Role Permission'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created Date')->date(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Updated at')->since(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    Tables\Actions\RestoreAction::make(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
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
