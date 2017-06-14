<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Support\Facades\App;
use App\Core\Models\User;
use Orchid\Core\Models\Post;
use Orchid\Facades\Dashboard;
use Orchid\Http\Controllers\Controller;

class TagController extends Controller
{

    /**
     * @param null $tag
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($tag = null){

        //$user = User::find(2);
        //$user->setTags([ 'foo']);
        //$user->save();

        if(is_null($tag)) {
           return response()->json([
                User::allTags()->orderBy('count', 'desc')->limit(10)->get()
           ]);
        }

        return response()->json([
            User::allTags()->orderBy('count', 'desc')->where('name', 'like', '%'.$tag.'%')->limit(10)->get()
        ]);
    }



}
