<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ItemInstance;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class IndividualController extends Controller
{

    public function index()
    {
        $user = Auth::user();

        //Display item instances for the currently per user
        $item_instances = ItemInstance::with('item', 'user')
            ->where('user_id', $user->id)
            ->get();
        $users = User::all();

        return view('individual.index', compact( 'users', 'item_instances'));
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
