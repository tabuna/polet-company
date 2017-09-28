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
        return response( $user->reviews()->paginate());
    }

    /**
     * @param Request $request
     * @param User    $user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request, User $user)
    {
        $review = $user->createReview([
            'text' => $request->get('text'),
        ], Auth::user());

        return response()->json($review);
    }



}
