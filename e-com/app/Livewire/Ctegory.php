<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class Ctegory extends Component
{

    public $name = '';
    public $code = '';
    public $description = '';

    public $isOpen = false;

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }
    public function render()
    {
        $categories = Category::all();
        return view('livewire.ctegory', compact('categories'));
    }
}