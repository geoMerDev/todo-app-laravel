<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the authenticated user's todos.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
       
        return view('todos.index');
    }

    /**
     * Display a listing of all todos.
     *
     * @return \Illuminate\View\View
     */
    public function allTodos()
    {
      
        return view('todos.all');
    }
}
