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

    public function store(Request $request)
    {
        // dd($request->post('title'));

        $todo = new Todo();
        $todo->title = $request->post('title');
        $todo->save();
        // return redirect('/');
        return redirect(route('home'));
        // return back(); //go to previous page
    }
}
