<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Models\Event;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    public static function getGloballySearchableAttributes(): array
    {
        return ['title_en', 'title_kh', 'detail_en', 'detail_kh'];
    }

//    protected static ?string $navigationGroup = 'Admin';
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
            'Title' => $record->title_en,
            'ចំណងជើង' => $record->title_kh,
        ];
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('English Text')
                    ->schema([
                        Forms\Components\TextInput::make('title_en')
                            ->label('English Title')
                            ->required(),
                        Forms\Components\RichEditor::make('detail_en')
                            ->label('English Detail')
                            ->required(),
                    ])->columnSpan(1),
                Forms\Components\Section::make('Khmer Text')
                    ->schema([
                        Forms\Components\TextInput::make('title_kh')
                            ->label('Khmer Title')
                            ->required(),
                        Forms\Components\RichEditor::make('detail_kh')
                            ->label('Khmer Detail')
                            ->required(),
                    ])->columnSpan(1),

                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\DatePicker::make('event_date')
                            ->label('Event Date')
                            ->required(),
                        Forms\Components\FileUpload::make('image')
                            ->label('Image Upload')
                            ->image()
                            ->enableOpen()
                            ->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title_en')
                    ->label('English Title')
                    ->limit(15)
                    ->searchable(),
                Tables\Columns\TextColumn::make('title_kh')
                    ->label('Khmer Title')
                    ->limit(15)
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.name')
                ->label('Owner'),
                Tables\Columns\ImageColumn::make('image')
                ->label('Image Upload'),
                Tables\Columns\TextColumn::make('event_date')
                ->label('Event Date'),
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
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'view' => Pages\ViewEvent::route('/{record}'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
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
