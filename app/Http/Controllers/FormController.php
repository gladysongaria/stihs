<?php

namespace App\Http\Controllers;

use App\Models\form;
use App\Models\User;
use Illuminate\Http\Request;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->usertype === 'Property Custodian' || auth()->user()->usertype === 'Admin') {
            $users = User::whereHas('forms')->with('forms')->get();
        } elseif (auth()->user()->usertype === 'User' || auth()->user()->usertype === 'Teacher') {
            $users = User::where('id', auth()->id())->whereHas('forms')->with('forms')->get();
        } else {
            return redirect()->back()->with('error', 'You are not authorized to view this page.');
        }
        return view('form.index', compact('users'));
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

            $form = new Form();
            $form->item_name = $itemName;
            $form->item_specification = $request->item_specification[$index];
            $form->quantity = $quantity;
            $form->purpose = $purpose;
            $form->user_id = auth()->id();
            $form->save();
        }

        return redirect()->back()->with('success', 'Forms created successfully.');
    }
}
