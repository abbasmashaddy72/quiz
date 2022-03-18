<?php

namespace App\Http\Livewire\Tables\Admin;

use App\Models\Result;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class ResultsTable extends LivewireDatatable
{
    public $model = Result::class;
    public $exportable = true;

    public function builder()
    {
        return Result::with('user', 'topic');
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->defaultSort('desc')
                ->filterable(),

            Column::name('user.name')
                ->searchable()
                ->filterable()
                ->label('User Name'),

            Column::name('topic.title')
                ->searchable()
                ->filterable()
                ->label('Topic Title'),

            DateColumn::name('created_at')
                ->filterable(),

            Column::callback(['id'], function ($id) {
                return view('admin.actions.result', ['id' => $id]);
            })->excludeFromExport()->unsortable()->label('Action'),
        ];
    }
}
