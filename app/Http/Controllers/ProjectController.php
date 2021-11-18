<?php

namespace App\Http\Controllers;

use Session;

use App\Models\Project;
use App\Models\User;
use App\Models\Task;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    public function index()
    {
        $projects   = Project::all();
        $users      = User::all();
        $tasks      = Task::all();

        //return view('projects.index')->with('projects', $projects);

        return view('projects.index')->with('projects', $projects)->with('users', $users)->with('tasks', $tasks);
    }


    public function create()
    {
        //return view('projects.create');
    }

    public function store(Request $request)
    {
        
        $project = new Project;
        $tasks = Task::all();

        $project->name = $request->name;
        $project->status = $request->status;
        $project->description = $request->description;

        $users = $request->user_id;
        $project->save();

        $project->users()->sync($request->user_id);
        
        Session:: flash ('nombre del mensaje', 'mensaje');
        Session:: flash ('success', ' successfully');
        

        return redirect()->back();
        return redirect()->back()->with('users', $users);
    }


    public function show(Project $id)
    {
        //
    }


    public function edit(Project $id)
    {
        //
    }


    public function update(Request $request, Project $id)
    {
        //
    }

    public function destroy(Project $id)
    {
        //
    }
}
