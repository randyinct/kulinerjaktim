<?php

namespace App\Http\Controllers;


use App\Models\Menu;
use App\Models\Place;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class PlaceMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Place $place)
    {
        if($request->ajax()){
            $menus = $place->menus;
            return DataTables::of($menus)
            ->addIndexColumn()
            ->editColumn('image', function ($menu) {
                return '<img src="'. $menu->image_url .'" />';
            })
            ->addColumn('action', 'places.menus.dt-action')
            ->rawColumns(['action', 'image'])
            ->toJson();
        }

        return view('places.menus.index',[
            'place' => $place,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Place $place, Category $category)
    {
        return view('places.menus.create',[
            'place' => $place,
            'categories' => $category->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Place $place, Request $request)
    {


        $this->validate($request, [
            'name' => ['required'],
            'description' => ['required'],
            'category_id' => ['required'],
            'price' => ['required', 'numeric'],
        ]);

        $image = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('images/menus');
        }

        $place->menus()->create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'category_id' => $request->category_id,
            'image' => $image,
            'price' => $request->price,
        ]);

         session()->flash('success', 'Data Menu Berhasil Ditambahkan');

        return redirect()->route('menu.index', $place);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Place $place, Menu $menu)
    {
        return view('places.menus.edit', [
            'place' => $place,
            'menu'=> $menu,
            'categories' => Category::get(),

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Place $place, Menu $menu)
    {
         $this->validate($request, [
            'name' => ['required'],
            'description' => ['required'],
            'category_id' => ['required'],
            'price' => ['required', 'numeric'],
        ]);

        $image = $menu->image;

        if ($request->hasFile('image')) {
           if(Storage::exists($menu->image)) {
            Storage::delete($menu->image);
           }
           $image = $request->file('image')->store('images/menus');
        }

        $menu->update([
            'name' => $request->name ?? $menu->name,
            'slug' => Str::slug($request->name) ?? $menu->slug,
            'description' => $request->description ?? $menu->description,
            'category_id' => $request->category_id ?? $menu->category_id,
            'image' => $image,
            'price' => $request->price ?? $menu->description,
        ]);

         session()->flash('success', 'Data Menu Berhasil Ditambahkan');

        return redirect()->route('menu.index', $place);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Place $place, Menu $menu)
    {
        if($menu){
            if(Storage::exists($menu->image)) {
                Storage::delete($menu->image);
            }

            $menu->delete();

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
