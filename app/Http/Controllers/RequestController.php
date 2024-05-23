<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\SupplyRequest;
use App\Models\PendingRequest;
use App\Http\Controllers\Controller;

class RequestController extends Controller
{
    public function index()
    {
        if (auth()->user()->usertype === 'Property Custodian' || auth()->user()->usertype === 'Admin') {
            $users = User::whereHas('pendingRequests')->with('pendingRequests')->get();
        } elseif (auth()->user()->usertype === 'User' || auth()->user()->usertype === 'Teacher') {
            $users = User::where('id', auth()->id())->whereHas('pendingRequests')->with('pendingRequests')->get();
        } else {
            return redirect()->back()->with('error', 'You are not authorized to view this page.');
        }
        return view('request.index', compact('users'));
    }

    public function approved()
    {
        if (auth()->user()->usertype === 'Property Custodian' || auth()->user()->usertype === 'Admin') {
            $users = User::whereHas('requests')->with('requests')->get();
        } elseif (auth()->user()->usertype === 'User' || auth()->user()->usertype === 'Teacher') {
            $users = User::where('id', auth()->id())->whereHas('requests')->with('requests')->get();
        } else {
            return redirect()->back()->with('error', 'You are not authorized to view this page.');
        }
        return view('request.approved', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_name.*' => 'required', // Use dot notation to validate array fields
            'item_specification.*' => 'required', // Use dot notation to validate array fields
            'quantity.*' => 'required',
            'purpose' => 'required',
        ]);

        $itemNames = $request->item_name;
        $quantities = $request->quantity;
        $purpose = $request->purpose;

        // Validate that the number of item names matches the number of quantities
        if (count($itemNames) !== count($quantities)) {
            return redirect()->back()->withErrors(['error' => 'Item names and quantities must have the same number of entries.'])->withInput();
        }

        foreach ($itemNames as $index => $itemName) {
            $quantity = $quantities[$index];

            $pending_request = new PendingRequest();
            $pending_request->item_name = $itemName;
            $pending_request->item_specification = $request->item_specification[$index];
            $pending_request->quantity = $quantity;
            $pending_request->purpose = $purpose;
            $pending_request->user_id = auth()->id();
            $pending_request->save();
        }

        return redirect()->back()->with('success', 'Forms created successfully.');
    }

    public function update($id)
    {
        $pendingRequest = new SupplyRequest();
        $pendingRequest->user_id = auth()->id();
        $pendingRequest->pending_request_id = $id;
        $pendingRequest->status = 'Approved';
        $pendingRequest->date = now();

        $pendingRequest->save();

        return redirect()->back()->with('success', 'Request approved successfully.');
    }

}
