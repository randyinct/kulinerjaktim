<?php

namespace App\Http\Controllers\Api\Places;

use App\Models\Place;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PlaceResource;

class ListPlaceController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $places = Place::query();

        if($request->has('keyword')) {
        $places = Place::searchPlace($request->keyword);
        }
        return PlaceResource::collection($places->paginate(10));
    }
}
