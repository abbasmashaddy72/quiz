<?php

namespace App\Http\Livewire\Forms\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserCru extends Component
{
    public $name, $email, $password;
    public $selected_id;

    public $updateMode = false;

    protected $rules = [
        'name' => '',
        'email' => '',
        'password' => ''
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.forms.admin.user-cru');
    }

    private function resetInput()
    {
        $this->name = null;
        $this->email = null;
        $this->password = null;
    }

    public function store()
    {
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        $this->emit('refreshUsersTable');
        $this->resetInput();
    }

    public function edit($id)
    {
        $record = User::findOrFail($id);

        $this->name = $record->name;
        $this->email = $record->email;
        $this->password = $record->password;

        $this->updateMode = true;
    }

    public function update()
    {
        if ($this->selected_id) {
            $record = User::findOrFail($this->selected_id);

            $record->update([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
            ]);

            $this->emit('refreshUsersTable');
            $this->resetInput();
            $this->updateMode = false;
        }
    }
}
