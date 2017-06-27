<?php

namespace App\Http\Controllers\Other;

use Illuminate\Support\Facades\App;
use App\Core\Models\User;
use App\Core\Models\City;
use Orchid\Http\Controllers\Controller;

class CityController extends Controller
{

    /**
     * @param null $tag
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($city = null){

        if (is_null($city)) {
            $tags = City::limit(10)->get();
        } else {
            $tags = City::where('name', 'like', '%' . $city . '%')->limit(10)->get();
        }

        return response()->json($tags);
    }



}
