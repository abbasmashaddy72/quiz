<?php

namespace App\Http\Livewire\Forms\Admin;

use App\Models\Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class Images extends Component
{
    use WithFileUploads;

    public $image, $model_id, $model;

    public $isUploaded = false;

    protected $rules = [
        'image' => '',
        'model' => '',
        'model_id' => ''
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

        $this->isUploaded = true;
    }

    private function resetInput()
    {
        $this->image = null;
    }

    public function store()
    {
        $validatedData = $this->validate();
        $validatedData['image'] = $this->image->store('public/topic_image');

        Image::create($validatedData);

        $this->emit('refreshImagesTable');
        $this->resetInput();
    }

    public function render()
    {
        $this->model = 'Topic';

        return view('livewire.forms.admin.images');
    }
}
