<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Orchid\CMS\Core\Models\Post;

class PageController extends Controller
{
    /**
     * @param Post $page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function show(Post $page)
    {
        return view('pages.default', [
            'page' => $page,
        ]);
    }
}
