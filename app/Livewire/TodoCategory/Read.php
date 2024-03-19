<?php

namespace App\Livewire\TodoCategory;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;

use App\Models\TodoCategory;
use Illuminate\Support\Facades\Auth;

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
        $TodosCategories = TodoCategory::whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($this->search) . '%'])
            ->orWhereRaw('LOWER(description) LIKE ?', ['%' . strtolower($this->search) . '%'])
            ->orderBy('id', 'asc')
            ->paginate(5);
        return view('livewire.todo-category.read', compact('TodosCategories'));
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
