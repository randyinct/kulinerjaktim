<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Place;
use App\Models\Review;
use App\Models\SubDistrict;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function __invoke(Place $place, User $user, SubDistrict $subDistrict, Review $review)
    {
        
        return view('dashboard.index',[
            'user' => $user->count(),
            'place' => $place->count(),
            'subDistrict' => $subDistrict->count(),
            'reviews' => $review->latest()->paginate(5),
        ]); 
    }
}
