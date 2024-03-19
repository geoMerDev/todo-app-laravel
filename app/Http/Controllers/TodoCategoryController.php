<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodoCategoryController extends Controller
{
    //
    public function index()
    {
       
        return view('todosCategories.index');
    }
}
