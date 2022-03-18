<?php

namespace App\Http\Livewire\Tables\Admin;

use App\Models\QuestionsOption;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class QuestionsOptionsTable extends LivewireDatatable
{
    public $model = QuestionsOption::class;
    public $exportable = true;

    public function builder()
    {
        return QuestionsOption::with('question');
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->defaultSort('desc')
                ->filterable(),

            Column::name('question.question_text')
                ->searchable()
                ->filterable()
                ->label('Question Title'),

            Column::name('option')
                ->searchable()
                ->filterable()
                ->label('Options'),

            BooleanColumn::name('correct')
                ->searchable()
                ->filterable()
                ->label('True/False'),

            DateColumn::name('created_at')
                ->filterable(),

            Column::callback(['id'], function ($id) {
                return view('admin.actions.question_option', ['id' => $id]);
            })->excludeFromExport()->unsortable()->label('Action'),
        ];
    }
}
