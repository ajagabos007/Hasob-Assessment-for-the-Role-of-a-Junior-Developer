<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Http\Requests\StoreUserRequest; 
use App\Http\Requests\UpdateUserRequest; 
use Illuminate\Support\Facades\Hash;
use App\Events\RegisteredUserEvent;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'status' => true,
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $user = User::create([
            'first_name' => $request->validated()['first_name'],
            'middle_name' => $request->validated()['middle_name'],
            'last_name' => $request->validated()['last_name'],
            'email' => $request->validated()['email'],
            'phone_number' => $request->validated()['phone_number'],
            'password' => Hash::make($request->validated()['password']),
        ]);

        event(new RegisteredUserEvent($user));

        return response()->json([
            'status' => true,
            'message' => "User account created successfully",
            'user' => $user
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return response()->json([
            'status' => true,
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        //
        $user->first_name = $request->validated()['first_name'];
        $user->middle_name = $request->validated()['middle_name'];
        $user->last_name = $request->validated()['last_name'];
        $user->phone_number = $request->validated()['phone_number'];
        $user->is_disabled = $request->validated()['is_disabled'];

        if($user->save())
            return response()->json([
                'status' => true,
                'message' => "User record updated successfully"
            ]);
        else
            return response()->json([
                'status' => false,
                'message' => 'User record updation failed'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if($user->delete())
            return response()->json([
                'status' => true,
                'message' => "User record delted successfully"
            ]);
        else
            return response()->json([
                'status' => false,
                'message' => 'User record deletion failed'
            ]);
    }
}
