<?php

namespace App\Http\Controllers\Profile;

use App\Core\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\AccountPasswordRequest;
use App\Http\Requests\Profile\AccountRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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

        $user->occupancy = 0;
        foreach ($user->attributesToArray() as $item) {
            if(is_null($item) || empty($item)){
                $user->occupancy++;
            }
        }


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
        $user = Auth::user();

        if ($account->hasFile('newAvatar')) {
            $img = Image::make($account->file('newAvatar'));
            $img->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $time = time();
            $date = date('Y/m/d');
            $name = str_random(40);
            Storage::disk('public')->makeDirectory($date);
            $name = sha1($time . $name);
            $fullPath = storage_path('app/public' . DIRECTORY_SEPARATOR . $date . DIRECTORY_SEPARATOR . $name . '.jpg');
            $img->save($fullPath, 60);

            $account->replace([
                'avatar' => '/storage/' . $date . '/' . $name . '.jpg',
            ]);
        }

        if($account->has('tags')){
            $tags = [];
            foreach ($account->get('tags') as $item){
                array_push($tags,$item['slug']);
            }
            $user->setTags($tags);
        }

        $user->fill($account->all())->save();

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

        return response(200);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function companies(){
       $companies = User::with('tags')->orderBy('created_at','DESC')->paginate(15);

       return response()->json($companies);
    }

}
