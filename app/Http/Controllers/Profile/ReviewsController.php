<?php

namespace App\Http\Controllers\Profile;

use App\Core\Models\Reviews;
use App\Core\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewsController extends Controller
{

    /**
     * @param User $user
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function show(User $user){

        $reviews = $user->reviews()->with([
            'author' => function($query){
                $query->select(['id','name','avatar','specialization']);
            }
        ])->orderByDesc('created_at')->paginate();

        return response($reviews);
    }

    /**
     * @param Request $request
     * @param User    $user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request, User $user)
    {
        Reviews::create([
            'text' => $request->get('text'),
            'reviewable_id' => $user->id,
            //'reviewable_type' => User::class, В миграци -  нету, в бд - нету(
            'author_id' => Auth::id(),
        ]);

        return response(200);
    }

}
