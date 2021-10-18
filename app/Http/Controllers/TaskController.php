<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $tasks = Task::all();

        return view('tasks.index')->with('tasks', $tasks);
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $task = new Task;

        $task->title = $request->title;
        $task->deadline = $request->deadline;
        $task->description = $request->description;
        $task->is_complete = false;

        $task->save();
        
        //Session:: flash ('nombre del mensaje', 'mensaje');
        Session:: flash ('success', ' successfully');

        return redirect()->route('tareas.index');

    }

    public function show(Task $id)
    {
        //
    }

    public function edit($id)
    {
        $task = Task::find($id);

        Session:: flash ('edit', ' andamos');

        return view('tasks.edit')->with('task', $task);
    }

    public function update(Request $request, $id)
    {
        $task = Task::find($id);

        $task->title = $request->title;
        $task->deadline = $request->deadline;
        $task->description = $request->description;

        $task->save();

        Session:: flash ('info', ' successfully');

        return redirect()->route('tareas.index');
    }

//funcion creada por nosotros para cambiar el estado de la tarea
    public function status ($id)
    {
        $task = Task::find($id);

        $task->is_complete = true;
        $task->save();

        Session:: flash ('status', 'successfully');

        return redirect()->back();

    }

    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();

        Session:: flash ('delete', ' successfully');

        return redirect()->back();
    }
}
