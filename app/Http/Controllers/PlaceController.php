<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\SubDistrict;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StorePlaceRequest;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\UpdatePlaceRequest;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $places = Place::with('subDistrict');

            return DataTables::of($places)
            ->addIndexColumn()
            ->addColumn('subDistrictName', function(Place $place){
                return $place->subDistrict->name;
            })
            ->addColumn('place-menu', 'places.place-link')
            ->addColumn('action', 'sub-district.dt-action')
            ->rawColumns(['place-menu','action'])            
            ->toJson();
        }
        return view('places.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Place $place)
    {
        
       
        return view('places.create',[
            'subDistricts' => subDistrict::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePlaceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'name' => ['required'],
            'description' => ['required'],
            'address' => ['required'],
            'phone' => ['required', 'numeric'],
            'image' => ['required', 'image'],
            'latitude' => ['required'],
            'longitude' => ['required'],
        ]);

        $image = null;

        if($request->has('image')) {
            $image = $request->file('image')->store('images');
        };


        Place::create([
            'sub_district_id' => $request->sub_district_id,
            'name' => $request->name,
            'description' => $request->description,
            'address' => $request->address,
            'phone' => $request->phone,
            'image' => $image,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude

        ]);

        session()->flash('success', 'data tempat kuliner berhasil ditambahkan!');

        return redirect()->route('place.index');
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
    public function edit(Place $place)
    {
        return view('places.edit', [
            'subDistricts' => SubDistrict::get(),
            'place' => $place,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * 
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Place $place)
    {
        $this->validate($request, [
            'name' => ['required'],
            'description' => ['required'],
            'address' => ['required'],
            'phone' => ['required', 'numeric'],
            'latitude' => ['required'],
            'longitude' => ['required'],
        ]);

        $image = $place->image;

        if($request->has('image')) {
            if(Storage::exists($place->image)) {
                Storage::delete($place->image);
            }
            $image = $request->file('image')->store('images');
        };


        $place->update([
            'sub_district_id' => $request->sub_district_id,
            'name' => $request->name,
            'description' => $request->description,
            'address' => $request->address,
            'phone' => $request->phone,
            'image' => $image,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude

        ]);

        session()->flash('success', 'data tempat kuliner berhasil diperbarui!');

        return redirect()->route('place.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function destroy(Place $place)
    {
        if($place->delete()){
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
