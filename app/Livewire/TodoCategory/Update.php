<?php

namespace App\Livewire\TodoCategory;

use Livewire\Component;
use App\Models\TodoCategory;
use Livewire\Attributes\On;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Update extends Component
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

    #[On('todoCategory-edit')]
    public function edit(TodoCategory $todoCategoryEdit)
    {

        $this->todoCategory = $todoCategoryEdit;

        $this->open = true;
    }


    public function update()
    {
        $this->validate();


        if ($this->todoCategory->isDirty()) {
            $this->todoCategory->save();

            // Cerrar el modal y renderizar
            $this->close();
            $this->dispatch('render');

            $this->alert('success', 'Todo Category Update successfully', [
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
        return view('livewire.todo-category.update');
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
}
