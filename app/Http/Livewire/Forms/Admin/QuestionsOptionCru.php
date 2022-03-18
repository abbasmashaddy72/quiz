<?php

namespace App\Http\Livewire\Forms\Admin;

use App\Models\QuestionsOption;
use Livewire\Component;

class QuestionsOptionCru extends Component
{
    public $question_id, $option, $correct;
    public $selected_id;

    public $updateMode = false;

    protected $rules = [
        'question_id' => '',
        'option' => '',
        'correct' => ''
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.forms.admin.questions-option-cru');
    }

    private function resetInput()
    {
        $this->question_id = null;
        $this->option = null;
        $this->correct = null;
    }

    public function store()
    {
        QuestionsOption::create([
            'question_id' => $this->question_id,
            'option' => $this->option,
            'correct' => $this->correct ?? 0,
        ]);

        $this->resetInput();
    }

    public function edit($id)
    {
        $record = QuestionsOption::findOrFail($id);

        $this->question_id = $record->question_id;
        $this->option = $record->option;
        $this->correct = $record->correct;

        $this->updateMode = true;
    }

    public function update()
    {
        if ($this->selected_id) {
            $record = QuestionsOption::findOrFail($this->selected_id);

            $record->update([
                'question_id' => $this->question_id,
                'option' => $this->option,
                'correct' => $this->correct,
            ]);
            $this->resetInput();
            $this->updateMode = false;
        }
    }
}
