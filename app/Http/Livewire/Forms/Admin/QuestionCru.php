<?php

namespace App\Http\Livewire\Forms\Admin;

use App\Models\Question;
use App\Services\Helper;
use Livewire\Component;

class QuestionCru extends Component
{
    public $topic_id, $question_text, $answer_explanation, $more_info_link;
    public $selected_id;

    public $updateMode = false;

    protected $rules = [
        'topic_id' => '',
        'question_text' => '',
        'answer_explanation' => '',
        'more_info_link' => ''
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.forms.admin.question-cru');
    }

    private function resetInput()
    {
        $this->topic_id = null;
        $this->question_text = null;
        $this->answer_explanation = null;
        $this->more_info_link = null;
    }

    public function store()
    {
        Question::create([
            'topic_id' => $this->topic_id,
            'question_text' => $this->question_text,
            'answer_explanation' => $this->answer_explanation,
            'more_info_link' => $this->more_info_link,
        ]);

        $this->emit('refreshQuestionsTable');
        $this->resetInput();
    }

    public function edit($id)
    {
        $record = Question::findOrFail($id);

        $this->topic_id = $record->topic_id;
        $this->question_text = $record->question_text;
        $this->answer_explanation = $record->answer_explanation;
        $this->more_info_link = $record->more_info_link;

        $this->updateMode = true;
    }

    public function update()
    {
        if ($this->selected_id) {
            $record = Question::findOrFail($this->selected_id);

            $record->update([
                'topic_id' => $this->topic_id,
                'question_text' => $this->question_text,
                'answer_explanation' => $this->answer_explanation,
                'more_info_link' => $this->more_info_link,
            ]);

            $this->emit('refreshQuestionsTable');
            $this->resetInput();
            $this->updateMode = false;
        }
    }
}
