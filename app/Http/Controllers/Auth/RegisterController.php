<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\RegisterUserRequest; 
use App\Events\RegisteredUserEvent;

class RegisterController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register(RegisterUserRequest $request)
    {
        $this->guard()->login($user = $this->create($request->validated()));

        event(new RegisteredUserEvent($user));
     
        return response()->json(['message'=>'User created successfully'],200);

    }
    protected function create(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'middle_name' => $data['middle_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'password' => Hash::make($data['password']),
            'is_disabled' => $data['is_disabled']
        ]);
    }

    protected function guard(){
        return Auth::guard();
    }
}
