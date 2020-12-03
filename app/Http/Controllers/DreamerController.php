<?php

namespace App\Http\Controllers;

use App\Dreamer;
use Illuminate\Http\Request;

class DreamerController extends Controller
{
    public function index()
    {
        return response()->json(Dreamer::all()->toArray());
    }

    public function store(Request $request)
    {
        $dreamer = Dreamer::create($request->only('name'));

        return response()->json([
            'status' => (bool)$dreamer,
            'message' => $dreamer ? 'Dreamer Created' : 'Error Creating Dreamer'
        ]);
    }

    public function show(Dreamer $dreamer)
    {
        return response()->json($dreamer);
    }

    public function tasks(Dreamer $dreamer)
    {
        return response()->json($dreamer->tasks()->orderBy('order')->get());
    }

    public function update(Request $request, Dreamer $dreamer)
    {
        $status = $dreamer->update($request->only('name'));

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Dreamer Updated!' : 'Error Updating Dreamer'
        ]);
    }

    public function destroy(Dreamer $dreamer)
    {
        $status = $dreamer->delete();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Dreamer Deleted' : 'Error Deleting Dreamer'
        ]);
    }
}
