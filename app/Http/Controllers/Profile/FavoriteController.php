<?php

namespace App\Http\Controllers\Profile;

use App\Core\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return response(User::whereLikedBy(Auth::user()->id)->with('tags')->paginate());
    }

    /**
     * @param User $user
     */
    public function update(User $user)
    {
        if (!$user->liked()) {
            return $user->like();
        }

        return $user->unlike();
    }

}
