<?php

namespace App\Http\Controllers;

use App\Models\scan;
use App\Models\User;
use App\Models\ItemInstance;
use Illuminate\Http\Request;

class ScanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $serial_number = request('serial_number');
        $item_instance = ItemInstance::with('user', 'item')->where('serial_number', $serial_number)->first();
        $users = User::all();

        return view('scan.index', compact('item_instance', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(scan $scan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(scan $scan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, scan $scan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(scan $scan)
    {
        //
    }

    public function scan()
    {
        $serial_number = request('serial_number');
        $item_instance = ItemInstance::with('user')->where('serial_number', $serial_number)->first();

        if ($item_instance) {
            // Return the item instance if found
            return view('scan.index', compact('item_instance'));
        } else {
            // Handle the case where item instance is not found
            return response()->json(['success' => false, 'message' => 'Item not found']);
        }
    }
}
