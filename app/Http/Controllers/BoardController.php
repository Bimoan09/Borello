<?php

namespace App\Http\Controllers;
use Illuminta\Http\Request;


class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(){


        $board = Board::all();
        return response()->json(['message'=> 'get data succes'], 200);
    }


    public function store(Request $request){

        $boardStore = Board::create([

            'name'=>$request->name,
            'user_id'=>'1'
        ]);

        return response()->json(['message'=> 'store data succes'], 200);   
    }
    
}
