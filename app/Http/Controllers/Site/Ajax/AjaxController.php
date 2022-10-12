<?php

namespace App\Http\Controllers\Site\Ajax;

use App\Http\Controllers\Controller;
use App\ORM\Location\City;
use App\ORM\User\User;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function searchCities($stateId)
    {
        $cities = City::where("state_id", $stateId)->orderBy('name')
            ->pluck('name', 'id');

        return response()->json($cities);
    }
}
