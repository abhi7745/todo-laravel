<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{

    // list all todo
    public function home() {
        // return view('welcome', ['name'=> 'abhijith']);
        $todo = Todo::all();
        // dd($todo);
        return view('home', ['todos'=>$todo]);
    }

    // Adding todos
    public function store(Request $request)
    {
        // dd($request->post('title'));

        $validateData = $request->validate([
            // 'title'=>'required|max:100',
            'title'=> ['required', 'max:100'],
        ]);

        // dd($validateData);

        // method - 1
        // // $todo = new Todo();
        // $todo = new Todo;
        // // $todo->title = $request->post('title');
        // $todo->title = $request->title;
        // $todo->save();

        // method - 2
        // only work when protected $fillable = ['title',]; add in related models file 'saving database'
        // or
        // only work when protected $guarded = []; //all field to be mass assignmentable
        Todo::create($validateData); # mass assignment of data, and saving to database

        // return redirect('/');
        return redirect(route('home'));
        // return back(); //go to previous page
    }

    // edit todo
    public function edit(Todo $id){
        // dd($id);

        // case - 1
        // $todo = Todo::find($id); // when a unknown id pass to find it will raise an issue
        // if (!$todo) return abort(404); // it will fix the issue of find

        // case - 2
        // $todo = Todo::findOrFail($id); // findOrFail automatically fix unknown id

        // case - 3
        // Route Model Binding - eg: public function edit(Todo $id){} // Todo is model name
        // dd($id); // $id will return the object and it will automatically fix unknown id

        // dd($todo);
        // return view('update', ['todo'=>$todo]);
        // or
        // return view('update', compact('todo')); // it return and pass a context variable todo like ['todo'=>$todo]

        // case -3 continuation
        return view('update', compact('id')); // the id is an object and pass to html page for render
    }

    // update todo
    public function update(Request $request, Todo $id) //the id is an object of model
    {
        // form validation using laravel method
        $validateData = $request->validate([
            'title'=> ['required', 'max:100'],
        ]);
        // dd($validateData);

        // case -1
        // $id->title = $validateData['title']; // the id is an object
        // $id->save(); //saving with update value
        // return redirect(route('home'));

        // case - 2
        // $id->update(['title'=>$validateData['title']]);
        // or
        $id->update($validateData); // it will automatically update and save to database
        return redirect(route('home'));
    }

    public function delete(Todo $id)
    {
        $id->delete();
        return back();
    }



}
