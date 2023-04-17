<?php

namespace App\Http\Controllers\Api;
use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Resources\TaskResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function index() {
        return TaskResource::collection(Task::all());
    }
    public function show($id) {
        $Task = Task::findOrFail($id);
        return new TaskResource($Task);
    }
    //post methode
    public function store(StoreTaskRequest $request) {
        Task::create($request->validated());
        return response()->json("task Created");
    }
    //put methode
    public function update(StoreTaskRequest $request, $id) {

        $tasks = Task::findOrFail($id);
        $tasks->update($request->validated());
        return response()->json("task updated");
    }
    public function destroy($id){
         $tasks = Task::findOrFail($id);
         $tasks->delete();
         return response()->json("task Deleted");
    }
}