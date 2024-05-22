<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Inventory;
use App\Models\ItemInstance;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inventories = Inventory::all();
        $categories = Category::all();
        return view('inventory.index', compact('inventories', 'categories',));
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

        $inventory = Inventory::firstOrCreate([
            'item_name' => $request->item_name,
            'category_id' => $request->category_id,

        ]);
        return redirect()->back();
    }

    public function show(ItemInstance $id)
    {
        if (auth()->user()->usertype == 'Admin' || auth()->user()->usertype == 'Property Custodian') {
            $pendingItemInstances = ItemInstance::whereNull('user_id')->get();
            $endorsedItemInstances = ItemInstance::with('user')->whereNotNull('user_id')->get();
        } else {
            $endorsedItemInstances = ItemInstance::where('user_id', auth()->user()->id)->get();
            $pendingItemInstances = [];
        }

        $users = User::all();
        return view('inventory.show', compact('users', 'pendingItemInstances', 'endorsedItemInstances'));
    }

    public function edit(Inventory $inventory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inventory $inventory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // $inventory = Inventory::findOrFail($id);
        // $inventory->delete();
        // return redirect()->back();
    }
}
