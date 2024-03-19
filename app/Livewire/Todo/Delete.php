<?php

namespace App\Livewire\Todo;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Todo;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Delete extends Component
{
    use LivewireAlert;

    public $open = false;
   
    public Todo $todo;

    public function mount()
    {
        $this->todo = new Todo();
    }
    #[On('todo-delete')]
    public function confirmDelete(Todo $todoDelete)
    {
        $this->todo = $todoDelete;

        $this->open = true;
    }

    public function delete()
    {

        $this->todo->delete();

       
        $this->close();
        $this->dispatch('render');

        $this->alert('success', 'Todo delete successfully', [
            'position' => 'top-start',
            'timer' => '4000',
            'toast' => true,
           ]);
    }

    public function render()
    {
        return view('livewire.todo.delete');
    }
    public function close()
    {
        $this->reset([
            'open',
            'todo',

        ]);

        $this->open = false;
        $this->todo = new Todo();
    }
}
