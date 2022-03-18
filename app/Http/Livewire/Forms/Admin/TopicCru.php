<?php

namespace App\Http\Livewire\Forms\Admin;

use App\Models\Topic;
use Livewire\Component;

class TopicCru extends Component
{
    public $title;
    public $selected_id;

    public $updateMode = false;

    protected $rules = [
        'title' => ''
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.forms.admin.topic-cru');
    }

    private function resetInput()
    {
        $this->title = null;
    }

    public function store()
    {
        Topic::create([
            'title' => $this->title,
        ]);

        $this->resetInput();
    }

    public function edit($id)
    {
        $record = Topic::findOrFail($id);

        $this->title = $record->title;

        $this->updateMode = true;
    }

    public function update()
    {
        if ($this->selected_id) {
            $record = Topic::findOrFail($this->selected_id);

            $record->update([
                'title' => $this->title,
            ]);

            $this->resetInput();
            $this->updateMode = false;
        }
    }
}
