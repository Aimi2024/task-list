<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




Route::get('/',function(){
   return redirect()-> route('tasks.index');
});
Route::view('/tasks/create', view: 'create')->name('tasks.create');

route::get('/tasks', function ()  {
    return view('index', [
        'tasks' => Task::latest()->paginate(5)

        //passing a data
    ]);
})->name('tasks.index');

route::get('/tasks/{task}/edit', function (Task $task)  {

    return view('edit',[
        'tasks' => $task
    ]);

})->name('tasks.edit');


// how to render using a render a blade directive
route::get('/tasks/{task}', function (Task $task)  {

    return view('task-details',[
        'tasks' => $task
    ]);

})->name('tasks.show');


Route::put('/tasks/{task}', function (Task $task,TaskRequest $request) {


     $task->update($request->validated());
     return redirect()->route('tasks.show', ['task'=> $task->id] )->with('success','Task updated successfully!');
 })->name('tasks.update');


Route::post('/tasks', function (TaskRequest $request) {


    $task = Task::create($request->validated());



    return redirect()->route('tasks.show',parameters: ['task'=> $task->id] )->with('success','Task Created successfully!');
})->name('tasks.store');

route::delete('/tasks/{task}',function(Task $task){
    $task->delete();
    return redirect()->route('tasks.index')->with('success','Task Deleted Successfully');
})->name('tasks.destroy');

Route::put('tasks/{task}/toggle-complete', function (Task $task) {
    // Call the method and capture the result
    $isCompleted = $task->toggleComplete();

    return redirect()
        ->back()
        ->with('success',  'Task Updated successfully!');
})->name('tasks.toggle-complete');



// Route::get('mainpage', function () {
//     return  'Mainpage';
// });

// Route::get('/hello', function () {
//     return 'hello';
// })->name('hello'); // this is how you name a routes

// //if you want to read something in the read in the database
// Route::get('/greet/{name}', function ($name) {
//     return 'hi ' . $name . '!';
// });

// //this is used for redirecting routes like if there is a missmatch on words
// Route::get('/hallo', function () {
//     return redirect()->route('hello');
// });

//only needed for cath route in other words if url does not match in the define this will run
route::fallback(function () {
    return 'Access restricted';

});
