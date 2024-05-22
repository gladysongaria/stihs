<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\EndorseTo;
use Illuminate\Http\Request;

class EndorseToController extends Controller
{
    public function index()
    {
        $items = Item::all();

        $endorseTo = EndorseTo::with('items');
        return view('endorseTo.index', compact('endorseTo', 'items', ));
    }


    public function create()
    {

        return view('endorseTo.create');

    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'endorsed_quantity' => $request->endorsed_quantity,
            'date_endorsed' => $request->date_endorsed,
            'teachers_in_charge' => 'required|array',
        ]);
        $endorseTo = EndorseTo::create([

            'endorsed_quantity' => $request->endorsed_quantity,
            'date_endorsed' => $request->date_endorsed,
            'teachers_in_charge' => 'required|array',
        ]);

        $endorseTo->teachersInCharge()->attach($validatedData['teachers_in_charge']);

        return view('endorseTo.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(EndorseTo $endorseTo)
    {
        $endorseTo = EndorseTo::find($endorseTo);
        return view('endorseTo.show', compact('endorseTo'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EndorseTo $endorseTo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EndorseTo $endorseTo)
    {
            $validatedData = $request->validate([

                'endorsed_quantity' => $request->endorsed_quantity,
                'date_endorsed' => $request->date_endorsed,
                'teachers_in_charge' => 'required|array',
            ]);
             // Sync teachers_in_charge to the room
        $endorseTo->teachersInCharge()->sync($validatedData['teachers_in_charge']);

        return redirect()->back()->with('success', 'Room updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EndorseTo $endorseTo)
    {
        //
    }
}
