<?php

namespace App\Livewire\TodoCategory;

use Livewire\Component;

use App\Models\TodoCategory;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;


class Create extends Component
{
    use LivewireAlert;

    public $open = false;

    public TodoCategory $todoCategory;


    protected $validationAttributes = [
        'todoCategory.name' => 'Name',
        'todoCategory.description' => 'Description',
        
    ];

    public function mount()
    {
        $this->todoCategory = new TodoCategory();
       
    }


    public function rules()
    {
        return [
            'todoCategory.name' => ['required', 'string', 'max:255'],
            'todoCategory.description' => ['required', 'string', 'max:255'],
           
        ];
    }

    
    public function store()
    {
     
        $this->validate();

        $todoCategory = TodoCategory::create([
            'name' => $this->todoCategory->name,
            'description' => $this->todoCategory->description,
            'created_by' => Auth::id(),

        ]);


        if ($todoCategory) {
            $this->close();
            $this->dispatch('render');

            $this->alert('success', 'Todo Category created successfully', [
                'position' => 'top-start',
                'timer' => '4000',
                'toast' => true,
               ]);
        }
    }

    public function close()
    {
        $this->reset([
            'open',
            'todoCategory',

        ]);

        $this->open = false;
        $this->todoCategory = new TodoCategory();
      

        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.todo-category.create');
    }
}
