<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;
    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $recordTitleAttribute = 'name'; // posso cercarla nel global search
    protected static ?string $navigationGroup = 'Shop'; // per creare submenu nella left-bar
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()->schema([
                    Forms\Components\Fieldset::make('Fieldset Campo slug')->schema([
                        Forms\Components\Section::make('Section Campo price')
                            ->description('Descrizione Campo price')->schema([

                                Forms\Components\Tabs::make('Due tabs')->tabs([
                                    Forms\Components\Tabs\Tab::make('primi campi')->schema([
                                        Forms\Components\TextInput::make('name')
                                            ->required()
                                            ->reactive()
                                            ->afterStateUpdated(function (\Closure $set, $state) {
                                                $set('slug', Str::slug($state));
                                            }),
                                        ]),
                                    Forms\Components\Tabs\Tab::make('secondi campi')->schema([
                                            Forms\Components\TextInput::make('slug')->required(),
                                        ]),
                                    ]),

                                Forms\Components\Wizard::make()->schema([
                                    Forms\Components\Wizard\Step::make('primi campi')->schema([
                                        Forms\Components\TextInput::make('price')->required()->rule('numeric'),
                                        ]),
                                    Forms\Components\Wizard\Step::make('secondi campi')->schema([
                                        Forms\Components\FileUpload::make('image'),
//                                         Forms\Components\MultiSelect::make('tags')->relationship('tags','name'), // è più completo il RelationManagers
                                        ]),
                                    ]),

                        ]),
                    ]),
                ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')->width(50)->height(50),
                Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('price')->sortable()->money('eur'),
                //
            ])
            ->defaultSort('price', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\TagsRelationManager::class, // scrivo qui la relation ManyToMany
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }

    protected static function getNavigationBadge(): ?string
    {
        return self::getModel()::count();
    }
}
