<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogResource\Pages;
use App\Models\Blog;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BlogResource extends Resource
{
    protected static ?string $model = Blog::class;

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationLabel = 'publication';

    protected static ?string $navigationIcon = 'heroicon-o-rss';

    public static function getGloballySearchableAttributes(): array
    {
        return ['title_en', 'title_kh', 'description_en', 'description_kh'];
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
                        Forms\Components\RichEditor::make('description_en')
                            ->label('English Description')
                            ->required(),
                    ])->columnSpan(1),
                Forms\Components\Section::make('Khmer Text')
                    ->schema([
                        Forms\Components\TextInput::make('title_kh')
                            ->label('Khmer Title')
                            ->required(),
                        Forms\Components\RichEditor::make('description_kh')
                            ->label('Khmer Description')
                            ->required(),
                    ])->columnSpan(1),
                Forms\Components\Card::make()->schema([
                    Forms\Components\FileUpload::make('image')
                        ->image()
                        ->enableOpen()
                        ->required()
                        ->columnSpan('full'),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title_en')
                    ->label('English Title')
                    ->limit(25)
                    ->searchable(),
                Tables\Columns\TextColumn::make('title_kh')
                    ->label('Khmer Title')
                    ->limit(25)
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.name')->searchable(),
                Tables\Columns\ImageColumn::make('image'),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
                Filter::make('created')->label('My Created')->query(fn (Builder $query): Builder => $query->where('user_id', '=', auth()->user()->id))
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
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlog::route('/create'),
            'view' => Pages\ViewBlog::route('/{record}'),
            'edit' => Pages\EditBlog::route('/{record}/edit'),
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
