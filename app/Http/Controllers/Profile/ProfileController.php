<?php

namespace App\Http\Controllers\Profile;

use App\Core\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\AccountPasswordRequest;
use App\Http\Requests\Profile\AccountRequest;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Orchid\Alert\Facades\Alert;

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
        return view('profile.edit', [
            'user' => Auth::user(),
        ]);
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


        return view('profile.show', [
            'user' => $user,
        ]);
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function password()
    {
        return view('profile.password');
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
        $user = Auth::user();

        if ($account->hasFile('avatar')) {
            $img = Image::make($account->file('avatar'));
            $img->fit(200);
            $user->avatar = (string) $img->encode('data-url');
        }

        $user->fill($account->except('avatar'));
        $user->save();

        Alert::success('Вы успешно изменили профиль');

        return back();
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

        return back();
    }

}
