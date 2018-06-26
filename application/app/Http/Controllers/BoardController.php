<?php

namespace App\Http\Controllers;

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
        $boards = $user->boards()->paginate(5);
        //dd($boards);

        return response()->json(['boards' => $boards], 200);
    }

    public function addBoard(Request $request){
        $user = Auth::user();
        $user->boards()->create([
            'table_name'=>$request->input('table_name')
        ]);

        return response(['status' => 'success'], 200);
    }
}
