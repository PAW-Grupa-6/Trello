<?php

namespace App\Http\Controllers;

use App\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        //$tables = \App\Board::where('user_id',2)->take(40)->get();
        //$tables = \App\Board::all();

        $boards = $user->boards()->paginate(5);
        //dd($boards);

        return view('home')->with(compact('boards'));
    }

    public function addBoard(Request $request){
        //dd($request->input('board_name'));
        $user = Auth::user();
        $user->boards()->create([
            'table_name'=>$request->input('board_name')
        ]);

        $board = new Board();
        $board->table_name = $request->input('board_name');
        $board->user_id = $user->id;
        $board->save();

        return redirect('/home');
    }
}
