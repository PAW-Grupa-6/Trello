<?php

namespace App\Http\Controllers;

use App\Board;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:3'
        ]);

        $user->boards()->find($request->board_id)->tasks()->create([
            'name'=>$request->input('name'),
            'description'=>$request->input('description')
        ]);

        return response(['status' => 'success'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $this->authorize('update', $task);

        if(!Auth::user()->boards()->find($request->board_id)){
            return response()->json(['message' => 'This action is unauthorized'], 403);
        }

        $task->board_id = $request->board_id;
        $task->save();
        return response()->json(['status' => 'success'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Task $task)
    {

        $this->authorize('destroy', $task);

        $task->delete();
        return response()->json(['status' => 'success'], 200);
    }
}
