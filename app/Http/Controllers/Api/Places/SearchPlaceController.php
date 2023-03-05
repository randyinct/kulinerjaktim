<?php

namespace App\Http\Controllers\Api\Places;

use App\Models\Place;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PlaceResource;

class SearchPlaceController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $places = Place::searchPlace($request->keyword)->paginate(5);


        return PlaceResource::collection($places);
    }
}
