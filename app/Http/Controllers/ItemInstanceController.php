<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ItemInstance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemInstanceController extends Controller
{

    public function index($id)
    {
        $pendingItemInstances = [];
        $endorsedItemInstances = [];

        if (auth()->user()->usertype == 'Admin' || auth()->user()->usertype == 'Property Custodian') {
            $pendingItemInstances = ItemInstance::where('item_id', $id)
                ->whereNull('user_id')
                ->get();

            $endorsedItemInstances = ItemInstance::where('item_id', $id)
                ->with('user')
                ->whereNotNull('user_id')
                ->get();
        } elseif (auth()->user()->usertype == 'Teacher' || auth()->user()->usertype == 'User') {
            $endorsedItemInstances = ItemInstance::where('user_id', auth()->user()->id)
                ->get();
        } else {
            return redirect()->back()->with('error', 'You are not authorized to view this page');
        }

        $users = User::all();

        return view('items.instances.index', compact('users', 'pendingItemInstances', 'endorsedItemInstances'));
    }

    public function update(Request $request, $id)
    {
        $itemInstance = ItemInstance::find($id);
        $itemInstance->update([
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Item instance updated successfully');
    }

    public function store(Request $request)
    {
        $number = mt_rand(10000000000, 9999999999);

        if ($this->serialNumberExists($number)) {
            $number = mt_rand(10000000000, 9999999999);
        }

        $request['serial_number'] = $number;
        ItemInstance::create($request->all());

        return redirect('/');
    }

    public function serialNumberExists($number)
    {
        return ItemInstance::whereSerialNumber($number)->exists();
    }

    public function destroy($id)
    {
        $itemInstance = ItemInstance::find($id);
        $itemInstance->delete();

        return redirect()->back()->with('success', 'Item instance deleted successfully');
    }

    public function endorse(Request $request, $id)
    {
        $itemInstance = ItemInstance::find($id);
        $itemInstance->update([
            'user_id' => $request->user,
        ]);

        return redirect()->back()->with('success', 'Item instance endorsed successfully');
    }

    public function scanItem(Request $request)
    {
        $itemInstance = ItemInstance::whereSerialNumber($request->serial_number)->first();

        if ($itemInstance) {
            return view('individual.show', compact('itemInstance'));
        }

        return redirect()->back()->with('error', 'Item instance not found');
    }

    public function endorsement()
    {
        $endorsedItemInstances = ItemInstance::where('user_id', auth()->user()->id)->get();

        return view('items.instances.endorsed', compact('endorsedItemInstances'));
    }
}
