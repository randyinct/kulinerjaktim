<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\Review;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Review $review, Request $request)
    {
        if ($request->ajax()) {
            $reviews = $review->where('user_id', auth()->user()->id)->get();
            return DataTables::Of($reviews)
            ->addIndexColumn()
            ->editColumn('name', function ($reviews){
                return $reviews->place->name;
            })
            ->editColumn('image', function ($reviews) {
                return '<img style="max-width: 150px;" src="'. $reviews->image_url .'" />';
            })
            ->addColumn('action', 'review.dt-action')
            ->rawColumns(['image','action'])            
            ->toJson();
        }
        return view('review.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Place $place)
    {
        $rating = [
            '1',
            '2',
            '3',
            '4',
            '5',
        ];
        return view('review.create', [
            'rating' => $rating,
            'place' => $place->all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $this->validate($request, [
            'place_id' => 'required',
            'reviews' => 'required|max:255',
            'image' => 'required',
            'rating' => 'required',
        ]);

        $image = null;

        if($request->has('image')) {
            $image = $request->file('image')->store('images');
        };

        Review::create([
            'user_id' => auth()->user()->id,
            'place_id' => $request->place_id,
            'image' => $image,
            'reviews' => $request->reviews,
            'rating' => $request->rating,
        ]);

        session()->flash('success', 'review anda berhasil ditambahkan!');

        return redirect()->route('review.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review, Place $place)
    {
        $rating = [
            '1',
            '2',
            '3',
            '4',
            '5',
        ];        
        return view('review.edit',[
            'review' => $review,
            'place' => $place->get(),
            'rating' => $rating,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        $this->validate($request, [
            'place_id' => 'required',
            'reviews' => 'required|max:255',
        'rating' => 'required',
        ]);

        $image = $review->image;

        if($request->has('image')) {
            if(Storage::exists($review->image)) {
                Storage::delete($review->image);
            }
            $image = $request->file('image')->store('images');
        };

        $review->update([
            'user_id' => auth()->user()->id,
            'place_id' => $request->place_id,
            'image' => $image,
            'reviews' => $request->reviews,
            'rating' => $request->rating,
        ]);

        session()->flash('success', 'Ulasan Anda Berhasil Diperbarui');

        return redirect()->route('review.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {

     if($review->delete()){
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
