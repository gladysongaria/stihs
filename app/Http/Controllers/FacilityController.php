<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    public function index()
    {
        $facilities = Facility::all();
        return view('facilities.index', compact('facilities'));
    }

    public function store(Request $request)
    {
        $facility = Facility::firstOrCreate([
            'facility_name' => $request->facility_name,
        ]);
       return redirect()->back()->with('success', 'Facility created successfully.');

    }

    public function update(Request $request, Facility $facility)
    {

        $facility->update($request->all());

        return redirect()->back()->with('success', 'Facility updated successfully.');
    }

    public function destroy(Facility $facility)
    {
        $facility->delete();

        return redirect()->back()->with('success', 'Facility deleted successfully.');
    }


}
