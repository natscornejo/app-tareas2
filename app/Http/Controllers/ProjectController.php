<?php

namespace App\Http\Controllers;

use Session;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    public function index()
    {
        $projects = Project::all();

        return view('projects.index')->with('projects', $projects);
    }


    public function create()
    {
        //return view('projects.create');
    }


    public function store(Request $request)
    {
        
        $project = new Project;

        $project->name = $request->name;
        $project->status = $request->status;
        $project->description = $request->description;
        
        $project->save();
        
        //Session:: flash ('nombre del mensaje', 'mensaje');
        /*Session:: flash ('success', ' successfully');
        */

        return redirect()->back();
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
