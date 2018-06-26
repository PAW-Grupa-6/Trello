<?php

namespace App\Http\Controllers;

use App\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BoardController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index() {
        $user = Auth::user();
        $boards = $user->boards()->with('tasks')->paginate(3);
        //dd($boards);

        return response()->json(['boards' => $boards], 200);
    }

    public function create(Request $request){
        $user = Auth::user();

        $request->validate([
            'table_name' => 'required|min:3',
        ]);

        $user->boards()->create([
            'table_name'=>$request->input('table_name')
        ]);

        return response(['status' => 'success'], 200);
    }

    public function update(Request $request, Board $board) {
        $user = Auth::user();

        $request->validate([
            'table_name' => 'required|min:3',
        ]);
        $board->table_name = $request->table_name;
        $board->save();
        return response()->json(['status' => 'success'], 200);
    }

    public function destroy(Request $request, Board $board) {
        $board->delete();
        return response()->json(['status' => 'success'], 200);
    }
}
