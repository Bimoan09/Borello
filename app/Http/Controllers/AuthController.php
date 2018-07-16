<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


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

    public function register(Request $request)
    
    {

            $users = User::create([

                'username'=>$request->username,
                'email'=> $request->email,
                'password'=> app('hash')->make($request->password),
                'api_token'=> str_random(50)
            ]);
       
            return response()->json(['user' => $users], 200);
    }

    public function login(Request $request)
    {

        $user = User::where('email', $request->email)->first();

        if(!$user)
        {
            return response()->json(['status'=>'error', 'message'=>'wrong password'], 400);
        }

        if(Hash::check($request->password, $user->password))
        {
            $user->update(['api_token'=>str_random(50)]);
            return response()->json(['status'=>'succes', 'user'=> $user], 200);
        };

    }

    public function logout(Request $request)
    {
   
        $users = User::where('api_token')->first();
        if(!$users)
        {
            return response()->json(['status'=>'error', 'message'=>'Not Login'], 400);
        }
        $users->api_token = null;
        $users->save();

        return response()->json(['status'=>'succes', 'message'=>'logout succes'], 200);

    }

    
}
