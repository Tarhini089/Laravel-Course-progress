<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

Route::get('/', function() {
  /* return redirect()->route('tasks.index'); */
});
Route::get('/tasks', function () {
    return view ('index', [
        'tasks' => \App\Models\Task::latest()->get()
    ]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')
->name('tasks.create');

Route::get('/tasks/{id}', function ($id) {
    return view ('show', [
      'task' => \App\Models\Task::findorfail($id)]);
})->name('task.show');

Route::post('/tasks', function(request $request) {
    dd($request->all());
})->name('tasks.store');
/* route::get('/hello', function() {
return 'hello';
})->name('hello');

route::get('/hallo', function(){
    return redirect()->route('hello');
});

route::get('/greet/{name}',function ($name) {

    return 'hello '. $name . '!';
}); */

Route::fallback(function () {
    return 'you are lost';
});

