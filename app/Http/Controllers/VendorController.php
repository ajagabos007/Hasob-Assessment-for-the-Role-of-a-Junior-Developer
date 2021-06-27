<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use App\Http\Requests\VendorRequest; 
use Illuminate\Http\Request;
use App\Events\VendorCreatedEvent;

class VendorController extends Controller
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
            'vendors' => Vendor::all()
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
    public function store(VendorRequest $request)
    {
        $vendor = Vendor::create([
            'name' => $request->validated()['name'],
            'category' => $request->validated()['category'],
        ]);
        event(new VendorCreatedEvent($vendor));
        return response()->json([
            'status' => true,
            'message' => "Vendor created successfully",
            'vendor' => $vendor
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show(Vendor $vendor)
    {
        return response()->json([
            'status' => true,
            'vendor' => $vendor
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendor $vendor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(VendorRequest $request, Vendor $vendor)
    {
        $vendor->name = $request->validated()['name'];
        $vendor->category = $request->validated()['category'];

        if($vendor->save())
            return response()->json([
                'status' => true,
                'message' => "Vendor record updated successfully",
                'vendor' => $vendor
            ]);
        else
            return response()->json([
                'status' => false,
                'message' => 'Vendor record updation failed'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendor $vendor)
    {
        if($vendor->delete())
            return response()->json([
                'status' => true,
                'message' => "Vendor record deleted successfully"
            ]);
        else
            return response()->json([
                'status' => false,
                'message' => 'Vendor record deletion failed'
            ]);
    }
}
