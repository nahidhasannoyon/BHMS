<?php

namespace App\Http\Controllers;

use App\Models\HostelBuilding;
use App\Http\Requests\StoreHostelBuildingRequest;
use App\Http\Requests\UpdateHostelBuildingRequest;
use Illuminate\Http\Request;

class HostelBuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $hostelBuildings = HostelBuilding::all();
            return view('admin.hostel.building_list', compact('hostelBuildings'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreHostelBuildingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $hostelBuilding = new HostelBuilding();
            $hostelBuilding->name = $request->name;
            $hostelBuilding->save();
            toast('New Building Added.', 'success');
            return redirect()->back();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HostelBuilding  $hostelBuilding
     * @return \Illuminate\Http\Response
     */
    public function show(HostelBuilding $hostelBuilding)
    {
        try {
            return $hostelBuilding;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HostelBuilding  $hostelBuilding
     * @return \Illuminate\Http\Response
     */
    public function edit(HostelBuilding $hostelBuilding)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHostelBuildingRequest  $request
     * @param  \App\Models\HostelBuilding  $hostelBuilding
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHostelBuildingRequest $request, HostelBuilding $hostelBuilding)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HostelBuilding  $hostelBuilding
     * @return \Illuminate\Http\Response
     */
    public function destroy(HostelBuilding $hostelBuilding)
    {
        //
    }
}
