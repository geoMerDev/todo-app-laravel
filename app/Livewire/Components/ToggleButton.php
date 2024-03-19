<?php

namespace App\Livewire\Components;

use Livewire\Component;
use Illuminate\Database\Eloquent\Model;

class ToggleButton extends Component
{
    public Model $model;
    public string $field;
    public bool $active;

    public function mount()
    {
        $this->active = (bool) $this->model->getAttribute($this->field);
    }
    public function updatedActive()
    {
        // dd($value, $this->field);
        $this->model->setAttribute($this->field, $this->active)->save();
       // $this->dispatch('render');
    }
    public function render()
    {
        return view('livewire.components.toggle-button');
    }
}
