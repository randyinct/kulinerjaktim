<?php

namespace App\Http\Controllers\Api\Menus;

use App\Models\Menu;
use App\Models\Place;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\MenuResource;

class ShowMenuController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Place $place, Menu $menu)
    {
        return new MenuResource($menu);
    }
}
