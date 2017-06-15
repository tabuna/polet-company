<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Support\Facades\App;
use App\Core\Models\User;
use Orchid\Http\Controllers\Controller;

class TagController extends Controller
{

    /**
     * @param null $tag
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($tag = null){
        if (is_null($tag)) {
            $tags = User::allTags()->orderBy('count', 'desc')->limit(10)->get();
        } else {
            $tags = User::allTags()->orderBy('count', 'desc')->where('name', 'like', '%' . $tag . '%')->limit(10)->get();
        }

        $tags->transform(function ($item, $key) {
            return  [
                'id' => $item['name'],
                'text' => $item['name'],
                'count' => $item['count']
            ];
        });

        return response()->json($tags);
    }



}
