<?php

namespace App\Livewire\Todo;

use Livewire\Component;
use App\Models\Todo;
use App\Models\TodoCategory;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Create extends Component
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
        $this->todo->assigned_to = Auth::id();
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


    public function store()
    {

        $this->validate();

        $todo = Todo::create([
            'title' => $this->todo->title,
            'assigned_to' => $this->todo->assigned_to,
            'todo_category_id' => $this->todo->todo_category_id,
            'created_by' => Auth::id(),

        ]);


        if ($todo) {
            $this->close();
            $this->dispatch('render');



            if ($todo->assignedTo->id != Auth::id()) {
                $this->alert('success', 'Todo Assigned to user: ' . $todo->assignedTo->name, [
                    'position' => 'top-start',
                    'timer' => '4000',
                    'toast' => true,
                ]);
            } else {
                $this->alert('success', 'Todo created successfully', [
                    'position' => 'top-start',
                    'timer' => '4000',
                    'toast' => true,
                ]);
            }
        }
    }

    public function close()
    {
        $this->reset([
            'open',
            'todo',

        ]);

        $this->open = false;
        $this->todo = new Todo();
        $this->todo->assigned_to = Auth::id();

        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.todo.create');
    }
}
