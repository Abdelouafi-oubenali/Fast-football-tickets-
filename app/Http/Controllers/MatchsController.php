<?php

namespace App\Http\Controllers;

use App\Models\Matchs;
use App\Http\Requests\StoreMatchsRequest;
use App\Http\Requests\UpdateMatchsRequest;

class MatchsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('matchs.cerate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMatchsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Matchs $matchs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Matchs $matchs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMatchsRequest $request, Matchs $matchs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Matchs $matchs)
    {
        //
    }
}
