<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CareerResource\Pages;
use App\Models\Career;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CareerResource extends Resource
{
    protected static ?string $model = Career::class;

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationGroup = 'Career Site';

    protected static ?string $navigationIcon = 'heroicon-o-presentation-chart-line';

    public static function getGloballySearchableAttributes(): array
    {
        return ['title_en', 'title_kh', 'business_unit_en', 'location_en', 'business_unit_kh', 'location_kh'];
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
                Forms\Components\Card::make()
            ->schema([
                Forms\Components\DatePicker::make('date_start')
                    ->label('Start Date')
                    ->required(),
                Forms\Components\DatePicker::make('date_end')
                    ->label('End Date')
                    ->required(),
                Forms\Components\Select::make('job_nature')
                    ->options([
                        'Full Time' => 'Full Time',
                        'Part Time' => 'Part Time',
                        'Internship' => 'Internship',
                    ])
                    ->rules(['required'])
                    ->columnSpan('full'),
            ])->columns(2),

                Forms\Components\Section::make('English Text')
                ->schema([
                    Forms\Components\TextInput::make('title_en')
                        ->label('English Title')
                    ->required(),
                    Forms\Components\TextInput::make('business_unit_en')
                        ->label('Business Unit English'),
                    Forms\Components\TextInput::make('location_en')
                        ->label('Location English')
                        ->required(),
                    Forms\Components\RichEditor::make('description_en')
                        ->label('Description English')
                        ->required(),
                ])->columnSpan(1),

                Forms\Components\Section::make('Khmer Text')
                    ->schema([
                        Forms\Components\TextInput::make('title_kh')
                            ->label('Khmer Title')
                            ->required(),
                        Forms\Components\TextInput::make('business_unit_kh')
                            ->label('Business Unit Khmer'),
                        Forms\Components\TextInput::make('location_kh')
                            ->label('Location Khmer')
                            ->required(),
                        Forms\Components\RichEditor::make('description_kh')
                            ->label('Description Khmer')
                            ->required(),
                    ])->columnSpan(1),
                Forms\Components\FileUpload::make('logo')
                ->image()
                ->required()
                ->columnSpan('full'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title_en')
                    ->label('English Title')
                    ->searchable()
                    ->limit(15),
                Tables\Columns\TextColumn::make('title_kh')
                    ->label('Khmer Title')
                    ->searchable()
                    ->limit(15),
                Tables\Columns\TextColumn::make('business_unit_en')
                    ->label('Business Unit English')
                    ->limit(15),
                Tables\Columns\TextColumn::make('business_unit_kh')
                    ->label('Business Unit Khmer')
                    ->limit(15),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Owner')
                    ->searchable(),
                BadgeColumn::make('date_end')
                    ->label('End Date')
                    ->colors([
                        'success',
                        'danger' => static fn ($state): bool => $state <= Carbon::now()->toDateString(),
                    ]),
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
            'index' => Pages\ListCareers::route('/'),
            'create' => Pages\CreateCareer::route('/create'),
            'view' => Pages\ViewCareer::route('/{record}'),
            'edit' => Pages\EditCareer::route('/{record}/edit'),
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
