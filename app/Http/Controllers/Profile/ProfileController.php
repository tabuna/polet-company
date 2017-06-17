<?php

namespace App\Http\Controllers\Profile;

use App\Core\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\AccountPasswordRequest;
use App\Http\Requests\Profile\AccountRequest;
use Illuminate\Support\Facades\Auth;
use Orchid\Alert\Facades\Alert;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{

    /**
     * @var
     */
    protected $user;

    /**
     * ProfileController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('cache');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return response()->json(User::where('id',Auth::id())->with('tags')->first());
    }

    /**
     * @param User|null $user
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(User $user)
    {
        if (!$user->exists) {
            $user = Auth::user();
        }

        $user->fave = $user->liked();

        return response()->json($user);
    }

    /**
     * Обновление профиля
     *
     * @param AccountRequest $account
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(AccountRequest $account)
    {
        if($account->has('newAvatar')) {
            $img = Image::make($account->get('newAvatar'));
            $img->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $account->replace([
                'avatar' => (string) $img->encode('data-url', 75),
            ]);
        }


        Auth::user()->fill($account->all())->save();

        /*
        if ($account->hasFile('avatar')) {
            $img = Image::make($account->file('avatar'));
            $img->fit(200);
            $user->avatar = (string) $img->encode('data-url');
        }
        */

        return response(200);
    }

    /**
     * Обновление пароля пользователя
     *
     * @param AccountPasswordRequest $account
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changePassword(AccountPasswordRequest $account)
    {
        $user = Auth::user();
        $user->password = bcrypt($account->password);
        $user->save();

        Alert::success('Ваш пароль успешно изменён');
        //return back();
        return response(200);
    }

}
