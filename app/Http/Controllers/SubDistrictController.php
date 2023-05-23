<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\SubDistrict;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;

class SubDistrictController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $subDistricts = SubDistrict::query();
            return DataTables::Of($subDistricts)
            ->addColumn('action', 'sub-district.dt-action')
            ->rawColumns(['place-menu','action'])            
            ->toJson();
        }
        return view('sub-district.index');
    }

   public function create(SubDistrict $subDistrict)
    {
        return view('sub-district.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePlaceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request,[
            'name' => 'required',
        ]);
        
        SubDistrict::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);

        session()->flash('success', 'Berhasil Menambahkan Data Kecamatan');

        return redirect()->route('sub-district.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function show(Place $place)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function edit(SubDistrict $SubDistrict, Request $request)
    {
        
        return view('sub-district.edit', [
            'subDistricts' => $SubDistrict,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * 
     * @param  \App\Models\subDistrict  $subDistrict
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubDistrict $subDistrict)
    {
     $this->validate($request, [
            'name' => 'required',
        ]);

        $subDistrict->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);

        session()->flash('success', 'Data Berhasil Diperbarui');

        return redirect()->route('sub-district.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\subDistrict  $subDistrict
     * @return \Illuminate\Http\Response
     */
    public function destroy(subDistrict $subDistrict)
    {

     if($subDistrict->delete()){
        session()->flash('error', 'Data Telah Dihapus');
        
        return response()->json([
            'success' => true,
        ]);
        }

        return response()->json([
            'success' => false,
        ]);

        }
}
