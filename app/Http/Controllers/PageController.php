<?php

namespace App\Http\Controllers;

use Orchid\Core\Models\Post;
use Orchid\Facades\Dashboard;

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
            'page' => $page
        ]);
    }
}
