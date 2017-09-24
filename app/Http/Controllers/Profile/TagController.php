<?php

namespace App\Http\Controllers\Profile;

use App\Core\Models\User;
use Orchid\Http\Controllers\Controller;

class TagController extends Controller
{

    /**
     * @param null $tag
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($tag = null)
    {

        if (is_null($tag)) {
            $tags = User::allTags()->orderBy('count', 'desc')->limit(10)->get();

            return response()->json($tags);
        }
        $tags = User::allTags()->orderBy('count', 'desc')->where('name', 'like', '%' . $tag . '%')->limit(10)->get();

        return response()->json($tags);
    }


}
