<?php

namespace App\Http\Controllers;

use App\Models\Source;
use Illuminate\Http\Request;

class SourceController extends Controller
{
    public function index()
    {
        $sources = Source::all();

        return view('sources.index', compact('sources'));
    }

    public function store(Request $request)
    {
        $source = Source::firstOrCreate([
            'source' => $request->source,
            'description' =>  $request->description,
        ]);

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $source = Source::find($id);
        $source->source = $request->input('source');
        $source->description = $request->input('description');
        $source->save();
        return redirect()->back();
    }

    public function destroy($id)
    {
        $source = Source::find($id);
        $source->delete();
        return redirect()->back();
    }

    public function sourceAcquisition()
    {
        $sources = Source::with('items')->get();

        return view('source_acquisition.index', compact('sources'));
    }
}
