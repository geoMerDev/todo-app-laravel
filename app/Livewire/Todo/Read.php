<?php

namespace App\Livewire\Todo;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use App\Models\Todo;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Read extends Component
{
    use WithPagination;

    public $search = "";

    protected $queryString = [
        'search' => ['except' => '']
    ];


    #[On('render')]
    public function render()
    {
        $myTodos = Todo::whereRaw('LOWER(title) LIKE ?', ['%' . strtolower($this->search) . '%']) 
            ->where('assigned_to', Auth::id())
            ->orderBy('id', 'asc')
            ->paginate(5);
        return view('livewire.todo.read', compact('myTodos'));
    }
    public function searchInDb()
    {

        $this->resetPage();
        $this->render();
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }

   
    public function todoToggle(Todo $todoToggle)
    {

        $todoToggle->is_complete = !$todoToggle->is_complete;
        $todoToggle->save();
        $this->render();
    }
}
