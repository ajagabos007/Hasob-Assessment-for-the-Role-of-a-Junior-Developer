<?php

namespace App\Http\Controllers;

use App\Models\AssetAssignment;
use App\Http\Requests\AssetAssignmentRequest; 
use Illuminate\Http\Request;
use App\Events\AssetAssignmentEvent;

class AssetAssignmentController extends Controller
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
            'assets_assignments' => AssetAssignment::all()
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
    public function store(AssetAssignmentRequest $request)
    {
        $assetAssignment = AssetAssignment::create([
            'asset_id' =>  $request->validated()['asset_id'],  
            'assignment_date' =>  $request->validated()['assignment_date'],
            'status' =>  $request->validated()['status'],
            'is_due' =>  $request->validated()['is_due'],
            'due_date' =>  $request->validated()['due_date'],
            'assigned_user_id' =>  $request->validated()['assigned_user_id'],
            'assigned_by' =>  $request->validated()['assigned_by'],
        ]);

        event(new AssetAssignmentEvent($assetAssignment));
        
        return response()->json([
            'status' => true,
            'message' => "Asset assignment created successfully",
            'asset assignment' => $assetAssignment
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AssetAssignment  $assetAssignment
     * @return \Illuminate\Http\Response
     */
    public function show(AssetAssignment $assetAssignment)
    {
        return response()->json([
            'status' => true,
            'asset assignment' => $assetAssignment
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AssetAssignment  $assetAssignment
     * @return \Illuminate\Http\Response
     */
    public function edit(AssetAssignment $assetAssignment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AssetAssignment  $assetAssignment
     * @return \Illuminate\Http\Response
     */
    public function update(AssetAssignmentRequest $request, AssetAssignment $assetAssignment)
    {
        $assetAssignment->asset_id =  $request->validated()['asset_id'];  
        $assetAssignment->assignment_date =  $request->validated()['assignment_date'];
        $assetAssignment->status =  $request->validated()['status'];
        $assetAssignment->is_due =  $request->validated()['is_due'];
        $assetAssignment->due_date =  $request->validated()['due_date'];
        $assetAssignment->assigned_user_id =  $request->validated()['assigned_user_id'];
        $assetAssignment->assigned_by =  $request->validated()['assigned_by'];

        if($user->save())
            return response()->json([
                'status' => true,
                'message' => "Asset assignment record updated successfully"
            ]);
        else
            return response()->json([
                'status' => false,
                'message' => 'Asset assignment record updation failed'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AssetAssignment  $assetAssignment
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssetAssignment $assetAssignment)
    {
        if($assetAssignment->delete())
            return response()->json([
                'status' => true,
                'message' => "Asset assignment record delted successfully"
            ]);
        else
            return response()->json([
                'status' => false,
                'message' => 'Asset assignment record deletion failed'
            ]);
    }
}
