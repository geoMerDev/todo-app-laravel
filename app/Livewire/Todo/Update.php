<?php

namespace App\Livewire\Todo;

use Illuminate\Support\Facades\Auth;

use Livewire\Component;
use App\Models\Todo;
use App\Models\TodoCategory;
use App\Models\User;
use Livewire\Attributes\On;

use Jantinnerezo\LivewireAlert\LivewireAlert;


class Update extends Component
{
    use LivewireAlert;

    public $open = false;

    public Todo $todo;

    public $selectTodoCategories;

    public $selectUsers;


    protected $validationAttributes = [
        'todo.title' => 'title',
        'todo.assigned_to' => 'Assigned to',
        'todo.todo_category_id' => 'Todo Category',
    ];

    public function mount()
    {
        $this->todo = new Todo();
        $this->selectTodoCategories = TodoCategory::all()->pluck('name', 'id');
        $this->selectUsers = User::all()->pluck('name', 'id');
    }

    public function rules()
    {
        return [
            'todo.title' => ['required', 'string', 'max:255'],
            'todo.assigned_to' => ['required', 'exists:App\Models\User,id'],
            'todo.todo_category_id' => ['required', 'exists:App\Models\TodoCategory,id'],
        ];
    }
    #[On('todo-edit')]
    public function edit(Todo $todoEdit)
    {

        $this->todo = $todoEdit;

        $this->open = true;
    }


    public function update()
    {
        $this->validate();


        if ($this->todo->isDirty()) {
            $this->todo->save();

            // Cerrar el modal y renderizar
            $this->close();
            $this->dispatch('render');

            $this->alert('success', 'Todo Update successfully', [
                'position' => 'top-start',
                'timer' => '4000',
                'toast' => true,
               ]);
        } else {

            $this->close();

            $this->alert('info', "I don't changes detected", [
                'position' => 'top-start',
                'timer' => '4000',
                'toast' => true,
               ]);
        }
    }


    public function render()
    {

        return view('livewire.todo.update');
    }
    public function close()
    {
        $this->reset([
            'open',
            'todo',

        ]);

        $this->open = false;
        $this->todo = new Todo();


        $this->resetErrorBag();
        $this->resetValidation();
    }
}
