<?php

namespace App\Http\Controllers;
use App\Board;
use Illuminate\Http\Request;



class BoardController extends Controller
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

        $index =  Board::all();
        $response = [
        'msg' => 'List of all board',
        'news' => $index
      ];
     return response()->json($response, 200);
    }

    public function find($id){

        $find = Board::find($id);

        if($find == NULL ){
        $response = [
            'msg'=> 'data tidak ada',
    
        ];
        return response()->json($response, 404);
    }
    
    else{
    
        return response()->json($find, 200);
    }

}

    public function store(Request $request){

        $boardStore = Board::create([

            'name'=>$request->name,
            'user_id'=>$request->user_id,

        ]);

        $response = [
            'msg' => 'data berhasil ditambah',
            'data' => $boardStore,
        ];

        return response()->json($response, 200);   
    }

    public function update(Request $request, $id){

        
        $board = Board::find($id);
        $board->update($request->all());

        $response = [
            'msg' => 'data berhasil diupdate',
            'data' => $board,
        ];
        return response()->json($response, 200);
    }

    public function delete($id){
        $board = Board::find($id);
        $board->destroy($id);

        if($board === NULL)
        {
            $failresponse = 
            [
                'msg' => 'data tidak ada'
            ];
            return response()->json($failresponse, 200);
        }
        else
        {
            $succesresponse = 
            [
            'msg' => 'data berhasil dihapus',
            ];
        return response()->json($succesresponse, 200);

        }
    }
    
}
