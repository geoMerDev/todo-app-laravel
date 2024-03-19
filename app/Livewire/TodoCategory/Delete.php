<?php

namespace App\Livewire\TodoCategory;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\TodoCategory;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Delete extends Component
{
    use LivewireAlert;

    public $open = false;
   
    public TodoCategory $todoCategory;

    public function mount()
    {
        $this->todoCategory = new TodoCategory();
    }
    #[On('todoCategory-delete')]
    public function confirmDelete(TodoCategory $todoCategoryDelete)
    {
        $this->todoCategory = $todoCategoryDelete;

        $this->open = true;
    }

    public function delete()
    {

        $this->todoCategory->delete();

       
        $this->close();
        $this->dispatch('render');

        $this->alert('success', 'Todo Category delete successfully', [
            'position' => 'top-start',
            'timer' => '4000',
            'toast' => true,
           ]);
    }
    public function render()
    {
        return view('livewire.todo-category.delete');
    }

    public function close()
    {
        $this->reset([
            'open',
            'todoCategory',

        ]);

        $this->open = false;
        $this->todoCategory = new TodoCategory();
    }
}
