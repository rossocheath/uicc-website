<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ApplyingResource\Pages;
use App\Models\Applying;
use App\Models\Career;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ApplyingResource extends Resource
{
    protected static ?string $model = Applying::class;

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationIcon = 'heroicon-o-save';

    protected static ?string $navigationLabel = 'Applying Job';

    protected static ?string $navigationGroup = 'Career Site';

    protected static function getNavigationBadge(): ?string
    {
        return Applying::query()->where('status', 'NEW')->count();
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

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('')
                ->schema([
                    Select::make('career_id')
                    ->label('Career Name')
                    ->options(Career::all()->pluck('title_en', 'id'))
                    ->searchable(),
                ]),
                Section::make('')
                ->schema([
                    TextInput::make('name'),
                    TextInput::make('email'),
                    TextInput::make('phone'),
                    FileUpload::make('file')
                    ->enableOpen()
                    ->enableDownload()
                    ->directory('files')
                    ->visibility('local'),
                    Textarea::make('cover_letter')
                    ->columnSpanFull(),
                ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('email'),
                TextColumn::make('phone'),
                BadgeColumn::make('status')
                    ->colors([
                        'warning' => 'NEW',
                        'success' => 'READ',
                    ]),
                TextColumn::make('career.title_en'),
            ])->defaultSort('id', 'DESC')
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListApplyings::route('/'),
            'create' => Pages\CreateApplying::route('/create'),
            'view' => Pages\ViewApplying::route('/{record}'),
            'edit' => Pages\EditApplying::route('/{record}/edit'),
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
