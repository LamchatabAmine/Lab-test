<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Project $project)
    {
        $projects = Project::all();
        $tasks = Task::where('project_id',$project->id)->paginate(3);
        return view('task.index', compact('tasks', 'project', 'projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Project $project)
    {
        return view('task.create', compact('project'));
    }


    public function store(Request $request, Project $project)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $data['project_id'] = $project->id;

        Task::create($data);

        return redirect()->route('task.index', ['project' => $project])->with('success', 'Tache créé avec succès');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project, Task $task)
    {
        return view('task.edit', ['task' => $task, 'project' => $project]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project,Task $task)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $data['project_id'] = $project->id;

        $task->update($data);

        return redirect()->route('task.index', ['project' => $project])->with('success', 'Tache updated avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project,Task $task)
    {
        $task->delete();

        return redirect()->route('task.index', ['project' => $project])->with('success', 'tache supprimé avec succès');
    }


    public function searchTask(Request $request, $project)
    {
        $search = $request->input('search');
        $project = Project::findOrFail($project);

        // Check if the search value is empty
        if (empty($search)) {
            $tasks = Task::where('project_id',$project->id)->paginate(3);
        } else {
            $tasks = Task::where('project_id', $project->id)->where('name', 'like', '%' . $search . '%')->paginate(3);
        }

        // Controller code
        if ($request->ajax()) {
            return response()->json([
                'table' => view('task.table', compact('tasks', 'project'))->render(),
                'pagination' => $tasks->links()->toHtml(),
            ]);
        }

    }






}
