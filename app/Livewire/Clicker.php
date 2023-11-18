<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Clicker extends Component
{
    public $name = '';
    public $email = '';
    public $password = '';


    public function clickMe()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ]);
    }

    public function render()
    {
        $user = User::all();
        return view('livewire.clicker', compact('user'));
    }
}