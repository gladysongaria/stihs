<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\individual;
use App\Models\ItemInstance;
use Illuminate\Http\Request;
use App\Models\IndividualList;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Export\ICSExport;

class IndividualController extends Controller
{

    public function index()
    {
        $user = Auth::user();

        //Display item instances for the currently per user
        $item_instances = ItemInstance::with('item', 'user')
            ->where('user_id', $user->id)
            ->get();

        $individuals = Individual::with('user')->get();
        $users = User::all();

        return view('individual.index', compact('individuals', 'users', 'item_instances'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $individual = individual::firstOrCreate([
            'user_id' => $request->user_id,
            'email' => $request->email,

        ]);
        return redirect()->back();
    }

    public function show($id)
    {
        $item_instances = ItemInstance::select('item_id', DB::raw('COUNT(*) as count'))
            ->where('user_id', $id)
            ->groupBy('item_id')
            ->get();

        return view('individual.show', compact('item_instances'));
    }
}
