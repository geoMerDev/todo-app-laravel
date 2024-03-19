<?php

namespace App\Livewire\AllTodos;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
use Livewire\Attributes\On;


class Read extends Component
{
    use WithPagination;

    public $search = "";

    protected $queryString = [
        'search' => ['except' => '']
    ];

    public function render()
    {
        $users = User::whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($this->search) . '%']) 
            
            ->orderBy('id', 'asc')
            ->paginate(4);

        return view('livewire.all-todos.read' ,compact('users'));
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
}
