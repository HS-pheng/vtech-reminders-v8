<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use App\Http\Resources\TodoResource;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    public function index(Request $request) {
        $filter = $request->query('filter');
        $todos = Todo::orderBy('created_at','desc')->where('todo', 'like', '%' . $filter . '%')->get();

        return response()->json([
            "success" => "true",
            "message" => "Successful request",
            "data" => TodoResource::collection($todos)
        ]);
    }

    public function store(StoreTodoRequest $request) {
        $todo = Todo::create([
            "todo"  => $request->all()["todo"],
            
            "is_completed" => false
        ]);

        return response()->json([
            "success" => "true",
            "message" => "Successfully created todo",
            "data" => new TodoResource($todo)
        ]);
    }

    public function update(UpdateTodoRequest $request, Todo $todo) {
        if ($request->has("todo")) {
            $todo->update([
                "todo" => $request->all()["todo"],
            ]);
        }
        if ($request->has("isCompleted")) {
            $todo->update([
                "is_completed" => $request->all()["isCompleted"],
            ]);
        }

        return response()->json([
            "success" => "true",
            "message" => "Successfully updated todo",
            "data" => new TodoResource($todo)
        ]);
    }

    public function destroy(Todo $todo) {
        $todo->delete();

        return response()->json([
            "success" => "true",
            "message" => "Successfully deleted todo",
        ]);
    }
}
