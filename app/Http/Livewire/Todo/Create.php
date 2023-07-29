<?php

namespace App\Http\Livewire\Todo;

use App\Models\Todo;
use Livewire\Component;
use Livewire\WithPagination;

class Create extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    //PROPERTIES
    public $todo_title = '';
    public $todo_description = '';

    public $search = '';

    protected $rules = [
        'todo_title' => 'required|min:3',
        'todo_description' => 'required'
    ];

    public function doCreate()
    {
        $this->validate();

        Todo::create([
            'title' => $this->todo_title,
            'description' => $this->todo_description,
        ]);

        session()->flash('created-message', 'Todo successfully created.');
        
        $this->reset([
            'todo_title',
            'todo_description',
        ]);
    }

    public function render()
    {
        if(strlen($this->search) > 2)
        {
            $this->resetPage();
            $todos = Todo::where('title', 'like', '%'. $this->search .'%')->latest()->paginate(5);
        }
        else
        {
            $todos = Todo::latest()->paginate(5);
        }

        return view('livewire.todo.create', [
            'todos' => $todos
        ]);
    }
}
