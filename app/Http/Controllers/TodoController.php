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

        $validateData = $request->validate([
            // 'title'=>'required|max:100',
            'title'=> ['required', 'max:100'],
        ]);

        // dd($validateData);

        // method - 1
        // $todo = new Todo();
        // $todo = new Todo;
        // // $todo->title = $request->post('title');
        // $todo->title = $request->title;
        // $todo->save();

        // method - 2
        // only work when protected $fillable = ['title',]; add in related models file 'saving database'
        // or
        // only work when protected $guarded = []; //all field to be mass assignmentable
        Todo::create($validateData); # mass assignment of data


        // return redirect('/');
        return redirect(route('home'));
        // return back(); //go to previous page
    }
}
