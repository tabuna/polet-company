<?php

namespace App\Http\Controllers\Profile;

use App\Core\Models\User;
use Illuminate\Support\Facades\Auth;

class FavoriteController
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return response(User::whereLikedBy(Auth::user()->id)->with('likeCounter')->paginate());
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
