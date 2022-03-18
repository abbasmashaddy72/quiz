<?php

namespace App\Http\Livewire\Tables\Admin;

use App\Models\Image;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class ImagesTable extends LivewireDatatable
{
    protected $listeners = ['refreshImagesTable' => '$refresh'];
    public $model = Image::class;
    public $exportable = true;

    public function builder()
    {
        return Image::query();
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->defaultSort('desc')
                ->filterable(),

            Column::callback(['image'], function ($image) {
                return view('admin.image-view', ['image' => $image]);
            })->unsortable()->label('Image'),

            Column::name('model')
                ->searchable()
                ->filterable()
                ->label('Related To'),

            Column::name('model_id')
                ->searchable()
                ->filterable()
                ->label('Related To ID'),

            DateColumn::name('created_at')
                ->filterable(),
        ];
    }
}
