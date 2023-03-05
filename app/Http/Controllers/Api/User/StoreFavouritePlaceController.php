<?php

namespace App\Http\Controllers\Api\User;

use App\Models\Place;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoreFavouritePlaceController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Place $place)
    {
        $user = $request->user();

        if($user->places()->wherePivot('place_id', $place->id)->exists()) {
            return response()->json([
                'message' => 'Place has already in your favourite lists.'
            ], 200);
        }

        $user->places()->attach($place->id);

        return response()->json([
            'message' => 'place added to favourite'
        ], 201);
    }
}
