<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodoCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'created_by',
    ];

    /**
     * Get the user that created the todo category.
     */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function todos()
    {
        return $this->hasMany(Todo::class, 'todo_category_id');
    }
}
