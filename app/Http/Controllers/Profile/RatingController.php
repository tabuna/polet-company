<?php

namespace App\Http\Controllers\Profile;

use App\Core\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Core\Models\Rating;

class RatingController extends Controller
{

    /**
     * @param User    $user
     * @param Request $request
     *
     * @return float|int
     */
    public function store(User $user, Request $request)
    {
        if (Auth::check()) {

            $rating = Rating::where('rateable_type', User::class)
                ->where('user_id', Auth::id())
                ->where('rateable_id', $user->id)
                ->first();

            if (is_null($rating)) {
                $rating = new Rating;
                $rating->rating = $request->get('rating');
                $rating->user_id = Auth::id();
                $user->ratings()->save($rating);
            } else {

                $rating->rating = $request->get('rating');
                $rating->save();
            }

            $options = $user->options;
            $options['rating'] = round($user->averageRating(), 2);
            $user->options = $options;
            $user->save();

            return [
                'title'   => 'Спасибо',
                'message' => 'Мы отобразим ваше впечаетление в рейтинге',
                'type'    => 'success',
            ];
        }

        return [
            'title'   => 'Ошибка',
            'message' => 'Что бы влиять на рейтинг необходимо авторизоваться',
            'type'    => 'error',
        ];
    }
}
