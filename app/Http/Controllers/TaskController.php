<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index() {
        $task = Task::all();
        return response()->json($task, 200);
    }

    public function show ($id){
        $task = Task::findOrFail($id);
        return response()->json($task, 200);
    }

    public function store(Request $request){
        $validated = $request->validate([
            'title'=>'sometimes|string|max:255',
            'description'=>'sometimes|string',
            'priority'=>'sometimes'
        ]);

        $task = Task::create($validated);
        return response()->json($task, 201);
    }

    public function update(Request $request, $id){
        $task = Task::findOrFail($id);
        $validated = $request->validate([
            'title'=>'sometimes|string|max:255',
            'description'=>'sometimes|string',
            'priority'=>'sometimes'
        ]);
        $task->update($validated);
        return response()->json($task, 200);
    }

    public function destroy($id) {
        $task = Task::findOrFail($id);
        $task->delete();
        return response()->json(null, 204);
    }
}
