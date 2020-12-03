<?php

namespace App\Http\Controllers;

use App\Type;
use Illuminate\Http\Request;

class TypeDreamer extends Controller
{
    public function index()
    {
        return response()->json(Type::all()->toArray());
    }

    public function store(Request $request)
    {
        $task = Type::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'user_id' => $request->user_id,
            'order' => $request->order,
            'avatar' => $request->avatar,
            'birthDate' => $request->birthDate,
        ]);

        return response()->json([
            'status' => (bool)$task,
            'data' => $task,
            'message' => $task ? 'Type Created!' : 'Error Creating Type'
        ]);
    }

    public function show(Type $task)
    {
        return response()->json($task);
    }

    public function update(Request $request, Type $task)
    {
        $status = $task->update(
            $request->only(['name', 'category_id', 'user_id', 'order', 'avatar', 'birthDate'])
        );

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Type Updated!' : 'Error Updating Type'
        ]);
    }

    public function destroy(Type $task)
    {
        $status = $task->delete();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Type Deleted!' : 'Error Deleting Type'
        ]);
    }
}
