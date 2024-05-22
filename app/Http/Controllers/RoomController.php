<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use App\Models\Facility;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::all();
        $facilities = Facility::all();
        $users = User::all();
        $teachersInCharge = User::with('rooms')->get();

        return view('rooms.index', compact('rooms', 'facilities', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'room_number' => 'required|numeric',
            'building_number' => 'required',
            'floor_number' => 'required|numeric',
            'facility_name' => 'required',
            'description' => 'nullable|string',
            'teachers_in_charge' => 'required|array',
        ]);

        $room = Room::create([
            'building_number' => $validatedData['building_number'],
            'floor_number' => $validatedData['floor_number'],
            'room_number' => $validatedData['room_number'],
            'description' => $validatedData['description'],
            'facility_id' => $validatedData['facility_name'],
        ]);

        $room->teachersInCharge()->attach($validatedData['teachers_in_charge']);

        return redirect()->back()->with('success', 'Room created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        $facilities = Facility::all();
        $users = User::all();

        return view('rooms.edit', compact('room', 'facilities', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $roomId)
    {
        $validatedData = $request->validate([
            'room_number' => 'required|numeric',
            'building_number' => 'required',
            'floor_number' => 'required|numeric',
            'facility_name' => 'required',
            'description' => 'nullable|string',
            'teachers_in_charge' => 'required|array',
        ]);

        $room = Room::findOrFail($roomId);

        // Update room details
        $room->update([
            'building_number' => $validatedData['building_number'],
            'floor_number' => $validatedData['floor_number'],
            'room_number' => $validatedData['room_number'],
            'description' => $validatedData['description'],
            'facility_id' => $validatedData['facility_name'],
        ]);

        // Sync teachers_in_charge to the room
        $room->teachersInCharge()->sync($validatedData['teachers_in_charge']);

        return redirect()->back()->with('success', 'Room updated successfully.');
    }

    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->back()->with('success', 'Room deleted successfully.');
    }
}
