<?php

namespace App\Http\Livewire\Tables\Admin;

use App\Models\Question;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class QuestionsTable extends LivewireDatatable
{
    protected $listeners = ['refreshQuestionsTable' => '$refresh'];
    public $model = Question::class;
    public $exportable = true;

    public function builder()
    {
        return Question::with('topic');
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->defaultSort('desc')
                ->filterable(),

            Column::name('topic.title')
                ->searchable()
                ->filterable()
                ->label('Topic Title'),

            Column::name('question_text')
                ->searchable()
                ->filterable()
                ->label('Question'),

            Column::name('answer_explanation')
                ->searchable()
                ->filterable()
                ->label('Explanations'),

            Column::name('more_info_link')
                ->searchable()
                ->filterable()
                ->label('Link'),

            DateColumn::name('created_at')
                ->filterable(),

            Column::callback(['id'], function ($id) {
                return view('admin.actions.question', ['id' => $id]);
            })->excludeFromExport()->unsortable()->label('Action'),
        ];
    }
}
