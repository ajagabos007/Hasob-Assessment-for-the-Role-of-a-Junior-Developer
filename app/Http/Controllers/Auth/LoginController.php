<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\LoginUserRequest;


class LoginController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(LoginUserRequest $request){
    
        $tokenValidity = (24*60); // one day token valid time in minute
       
       $this->guard()->factory()->setTTL($tokenValidity);
        
        if(!$token = $this->attemptLogin($request))
            return response()->json(['error'=>'Unauthorised, Login attempt failed'], 401);
        return response()->json([
            'token' =>$token,
            'token_type' => 'bearer',
            'token_validity' => $this->guard()->factory()->getTTL(),
            
        ],200);
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function attemptLogin($request)
    {
        return $this->guard()->attempt(
            $this->credentials($request)//, $request->filled('remember')
        );
    }

     /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials($request)
    {
        return $request->only('email', 'password');
    }

    public function logout(){
        auth()->logout();
        return response()->json(['message'=>'User logged out succesfully'],200);
    }

    protected function guard(){
        return Auth::guard();
    }
}
