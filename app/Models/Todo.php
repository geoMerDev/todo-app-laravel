<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'is_complete',
        'created_by',
        'assigned_to',
        'todo_category_id', 
    ];

    /**
     * Get the user that created the todo.
     */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the user that the todo is assigned to.
     */
    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    /**
     * Get the category of the todo.
     */
    public function category()
    {
        return $this->belongsTo(TodoCategory::class, 'todo_category_id');
    }
}
