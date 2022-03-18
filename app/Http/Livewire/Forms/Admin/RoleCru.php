<?php

namespace App\Http\Livewire\Forms\Admin;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class RoleCru extends Component
{
    public $name;
    public $selected_id;

    public $updateMode = false;

    protected $rules = [
        'name' => ''
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.forms.admin.role-cru');
    }

    private function resetInput()
    {
        $this->name = null;
    }

    public function store()
    {
        Role::create([
            'name' => $this->name,
        ]);

        $this->resetInput();
    }

    public function edit($id)
    {
        $record = Role::findOrFail($id);

        $this->name = $record->name;

        $this->updateMode = true;
    }

    public function update()
    {
        if ($this->selected_id) {
            $record = Role::findOrFail($this->selected_id);
            $record->update([
                'name' => $this->name,
            ]);

            $this->resetInput();
            $this->updateMode = false;
        }
    }
}
