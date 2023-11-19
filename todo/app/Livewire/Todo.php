<?php

namespace App\Livewire;

use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Todo extends Component
{
    use WithPagination;

    public $editID;
    #[Rule(['required', 'min:3', 'max:255'])]
    public $editName;

    #[Rule(['required', 'min:3', 'max:255'])]
    public $name;

    public $search;


    // create todo
    public function createTo()
    {
        // validate
        $validate = $this->validateOnly('name');

        // create todo
        \App\Models\Todo::create($validate);
        // clear input
        $this->reset('name');
        // send message
        session()->flash('success', 'Todo Created Successfully');
        $this->resetPage();
    }


    // delete todo
    public function deleteTo($id)
    {
        // find todo
        $todo = \App\Models\Todo::find($id);


        try {
            //code...
            $todo->delete();
        } catch (\Throwable $th) {
            throw $th;
        }
        // delete todo
        // send message
        session()->flash('message', 'Todo Deleted Successfully');
    }



    // checkbox
    public function toggle($id)
    {
        // find todo
        $todo = \App\Models\Todo::find($id);
        // update todo
        $todo->is_done = !$todo->is_done;
        try {
            // save todo
            $todo->save();
        } catch (\Throwable $th) {
            throw $th;
        }
        // send message
        session()->flash('message', 'Todo Updated Successfully');
    }




    // edit todo
    public function edit($id)
    {
        $this->editID = $id;
        // find todo
        $todo = \App\Models\Todo::find($id);
        // update todo
        $this->editName = $todo->name;


        try {
            // save todo
            $todo->save();
        } catch (\Throwable $th) {
            throw $th;
        }


        // send message
        session()->flash('message', 'Todo Updated Successfully');
    }



    // cancel update

    public function cancel()
    {
        $this->reset('editID', 'editName');
    }


    // update todo
    public function update()
    {
        // validate
        $validate = $this->validateOnly('editName');

        // find todo
        $todo = \App\Models\Todo::find($this->editID);
        // update todo
        $todo->name = $validate['editName'];
        try {
            // save todo
            $todo->save();
        } catch (\Throwable $th) {
            throw $th;
        }
        // send message
        session()->flash('message', 'Todo Updated Successfully');
        // clear input
        $this->reset('editID', 'editName');
    }



    public function render()
    {
        $todo = \App\Models\Todo::latest()
            ->where('name', 'like', '%' . $this->search . '%')
            ->paginate(5);
        return view('livewire.todo', compact('todo'));
    }
}
