<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;



class AuthController extends Controller
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

    public function register(Request $resuest)
    
    {

            $users = User::create([

                'username'=>$request->username,
                'email'=> $request->email,
                'password'=> bcrypt($request->password),
                'api_token'=> str_random(50)
            ]);
       
            return response()->json(['user' => $user], 200);
    }

    public function login(Request $request)
    {

        $login = User::where('email', $request->email)->where('password', bcrypt($request->password))->first();

        if(!login)
        {
            return response()->json(['status'=>'error', 'message'=>'token invalid'], 400);
        }
        else
        {
            return response()->json(['status'=>'succes', 'login'=> $login], 200);
        }

    }

    public function logout(Request $request )
    {
   
        $api_token = $request->api_token;
        $users = User::with('api_token', $api_token)->first();
        if(!users)
        {
            return response()->json(['status'=>'error', 'message'=>'Not Login'], 400);
        }
        else
        {
            return response()->json(['status'=>'succes', 'message'=>'logout succes'], 200);
        }
        $user->api_token = NULL;
        $user->save();

    }

    
}
