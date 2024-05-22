<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\IndividualList;

class IndividualListController extends Controller
{

    public function index()
    {
        $individualLists = IndividualList::with('user')->get();
        $users = User::all();

        return view('individual.show', compact('individualLists','users',));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(IndividualList $individualList)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IndividualList $individualList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, IndividualList $individualList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IndividualList $individualList)
    {
        //
    }
}
