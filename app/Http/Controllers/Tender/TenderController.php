<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Orchid\Core\Models\Post;
use Orchid\Facades\Dashboard;

class TenderController extends Controller
{

    /**
     * @param $typeRequest
     *
     * @return mixed
     */
    public function index($typeRequest)
    {
        $typeObject = Dashboard::getPosts()->find($typeRequest) ?? abort(404);

        $elements = Post::where('type', $typeRequest)
            ->whereNotNull('content->' . App::getLocale());
        if (property_exists($typeObject, 'filters')) {
            foreach ($typeObject->filters as $filter) {
                $elements = (new $filter)->filter($elements);
            }
        }
        $elements = $elements->simplePaginate(10);

        return request()->json($elements);
    }

    /**
     * @param      $typeRequest
     * @param Post $item
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($typeRequest, Post $item)
    {
        $types = Dashboard::posts();
        $typeObject = null;
        foreach ($types as $type) {
            if ($type->slug == $typeRequest) {
                $typeObject = $type;
                break;
            }
        }
        if (is_null($typeObject)) {
            abort(404);
        }

        return response()->json($item);
    }


}
