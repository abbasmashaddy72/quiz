<?php

namespace App\Http\Livewire\Views\Admin;

use App\Models\Image;
use Livewire\Component;
use Livewire\WithPagination;

class QuizImages extends Component
{
    use WithPagination;

    protected $paginationTheme = 'simple-tailwind';

    public function render()
    {
        $images = Image::where('model', 'Topic')->paginate(1);

        return view('livewire.views.admin.quiz-images', compact('images'));
    }
}
