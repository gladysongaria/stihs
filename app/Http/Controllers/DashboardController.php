<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dashboard;
use App\Models\ItemInstance;
use App\Models\PendingRequest;
use App\Models\SupplyRequest;
use App\Models\User;
use Illuminate\Foundation\Bus\PendingChain;

class DashboardController extends Controller
{
    public function index()
    {
        $users_count = User::count();
        $pending_item_instances = ItemInstance::whereNull('user_id')
            ->get();
        $endorsed_item_instances = ItemInstance::with('user')
            ->whereNotNull('user_id')
            ->get();
        $good_conditions = ItemInstance::with('user')
            ->where('status', 'Good Condition')
            ->get();
        $damages = ItemInstance::with('user')
            ->where('status', 'Damaged')
            ->get();

        $for_repairs = ItemInstance::with('user')
            ->where('status', 'For Repair')
            ->get();

        $approved_requests = SupplyRequest::where('status', 'Approved')->get();
        $declined_requests = SupplyRequest::where('status', 'Declined')->get();
        $pending_requests = PendingRequest::all();

        return view('admin.index', compact(
            'users_count',
            'pending_requests',
            'approved_requests',
            'declined_requests',
            'pending_item_instances',
            'endorsed_item_instances',
            'good_conditions',
            'damages',
            'for_repairs'
        ));
    }
}
