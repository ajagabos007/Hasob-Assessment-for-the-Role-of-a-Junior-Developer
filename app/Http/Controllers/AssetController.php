<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Http\Requests\AssetRequest; 
use Illuminate\Http\Request;
use App\Events\AssetEvent;


class AssetController extends Controller
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
            'asset' => Asset::all()
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
    public function store(AssetRequest $request)
    {
        $vendor = Vendor::create([
            'type' =>  $request->validated()['type'],  
            'serial_number' =>  $request->validated()['serial_number'],
            'description' =>  $request->validated()['description'],
            'fixed' =>  $request->validated()['fixed'],
            'picture_path' =>  $request->validated()['picture_path'],
            'purchase_date' =>  $request->validated()['purchase_date'],
            'start_use_date' =>  $request->validated()['start_use_date'],
            'purchase_price' =>  $request->validated()['purchase_price'],
            'warranty_expiry_date' =>  $request->validated()['warranty_expiry_date'],
            'degradation' =>  $request->validated()['degradation'],
            'current_value' =>  $request->validated()['current_value'],
            'location' =>  $request->validated()['location']
        ]);

        event(new AssetCreatedEvent($asset));
        return response()->json([
            'status' => true,
            'message' => "Vendor created successfully",
            'vendor' => $vendor
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function show(Asset $asset)
    {
        return response()->json([
            'status' => true,
            'asset' => $asset
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function edit(Asset $asset)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function update(AssetRequest $request, Asset $asset)
    {
        $asset->type = $request->validated()['type'];  
        $asset->serial_number = $request->validated()['serial_number'];
        $asset->description = $request->validated()['description'];
        $asset->fixed = $request->validated()['fixed'];
        $asset->picture_path = $request->validated()['picture_path'];
        $asset->purchase_date = $request->validated()['purchase_date'];
        $asset->start_use_date = $request->validated()['start_use_date'];
        $asset->purchase_price = $request->validated()['purchase_price'];
        $asset->warranty_expiry_date = $request->validated()['warranty_expiry_date'];
        $asset->degradation = $request->validated()['degradation'];
        $asset->current_value = $request->validated()['current_value'];
        $asset->location = $request->validated()['location'];

        if($asset->save())
            return response()->json([
                'status' => true,
                'message' => "Asset record updated successfully",
                'asset' => $asset
            ]);
        else
            return response()->json([
                'status' => false,
                'message' => 'Asset record updation failed'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asset $asset)
    {
        if($asset->delete())
            return response()->json([
                'status' => true,
                'message' => "asset record deleted successfully"
            ]);
        else
            return response()->json([
                'status' => false,
                'message' => 'Asset record deletion failed'
            ]);
    }
}
