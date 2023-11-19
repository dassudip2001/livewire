<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Clicker extends Component
{
    #[Rule('required|min:2|max:255')]
    public $name = '';
    #[Rule('required|min:2|max:255')]

    public $email = '';
    #[Rule('required|min:2|max:255')]

    public $password = '';


    public function clickMe()
    {
        $validate = $this->validate();
        // $this->validate([
        //     'name' => 'required',
        //     'email' => 'required',
        //     'password' => 'required'
        // ]);
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ]);

        $this->reset(['name', 'email', 'password']);
        session()->flash('success', 'User Created Successfully.');
    }

    public function render()
    {
        $user = User::paginate(2);
        return view('livewire.clicker', compact('user'));
    }
}