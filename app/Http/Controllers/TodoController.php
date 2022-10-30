<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function home() {
        // return view('welcome', ['name'=> 'abhijith']);
        $todo = Todo::all();
        // dd($todo);
        return view('home', ['todos'=>$todo]);
    }
}
