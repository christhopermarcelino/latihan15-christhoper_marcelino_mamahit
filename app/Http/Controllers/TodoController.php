<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {}

    public function index()
    {
        $todo = Todo::all();
        return response()->json($todo, 200);
    }

    public function show($id)
    {
        $todo = Todo::find($id);
        if (!$todo) {
            return response()->json([
                'message' => 'Todo not found'
            ], 404);
        }
        return response()->json($todo, 200);
    }


    public function store(Request $request)
    {
        $todo = Todo::create($request->all());
        return response()->json($todo, 200);
    }

    public function update(Request $request, $id)
    {
        $todo = Todo::find($id);
        if (!$todo) {
            return response()->json([
                'message' => 'Todo not found'
            ], 404);
        }
        $todo->update($request->all());
        return response()->json($todo, 200);
    }

    public function destroy($id)
    {
        $todo = Todo::find($id);
        if (!$todo) {
            return response()->json([
                'message' => 'Todo not found'
            ], 404);
        }
        $todo->delete();
        return response()->json([
            'message' => 'Todo deleted'
        ], 404);
    }
}
