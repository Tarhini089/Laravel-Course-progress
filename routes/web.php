<?php

use Illuminate\Support\Facades\Route;
use Illuminate\http\response;



class Task
{
  public function __construct(
    public int $id,
    public string $title,
    public string $description,
    public ?string $long_description,
    public bool $completed,
    public string $created_at,
    public string $updated_at
  ) {
  }
}

$tasks = [
  new Task(
    1,
    'Buy groceries',
    'Task 1 description',
    'Task 1 long description',
    false,
    '2023-03-01 12:00:00',
    '2023-03-01 12:00:00'
  ),
  new Task(
    2,
    'Sell old stuff',
    'Task 2 description',
    null,
    false,
    '2023-03-02 12:00:00',
    '2023-03-02 12:00:00'
  ),
  new Task(
    3,
    'Learn programming',
    'Task 3 description',
    'Task 3 long description',
    true,
    '2023-03-03 12:00:00',
    '2023-03-03 12:00:00'
  ),
  new Task(
    4,
    'Take dogs for a walk',
    'Task 4 description',
    null,
    false,
    '2023-03-04 12:00:00',
    '2023-03-04 12:00:00'
  ),
];

route::get('/', function() {
  return redirect()->route('tasks.index');
});

Route::get('/tasks', function () use($tasks) {
    return view ('index', [
        'tasks' => $tasks
    ]);
})->name('tasks.index');

route::get('/tasks/{id}', function ($id) use ($tasks) {
    $task = collect($tasks)->firstwhere('id',$id);

    if(!$task) {
      abort(response::http_not_found);
    }

    return view ('show', ['task' => $task]);
})->name('task.show');

/* route::get('/hello', function() {
return 'hello';
})->name('hello');

route::get('/hallo', function(){
    return redirect()->route('hello');
});

route::get('/greet/{name}',function ($name) {

    return 'hello '. $name . '!';
}); */

route::fallback(function () {
    return 'you are lost';
});

