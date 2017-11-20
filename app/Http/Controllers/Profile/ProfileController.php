<?php

namespace App\Http\Controllers\Profile;

use App\Core\Models\Search;
use App\Core\Models\Statistics;
use App\Core\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\AccountPasswordRequest;
use App\Http\Requests\Profile\AccountRequest;
use Carbon\Carbon;
use Cartalyst\Tags\IlluminateTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
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

        $user = User::where('id', Auth::id())->with(['tags', 'city'])->first();
        if($user->tags_demand){
            $tags_demand = [];
            $tags_demand = explode ( ",", $user->tags_demand);
            $tags_demand_arrs=[];
            foreach ($tags_demand as $tag) {
                if ($tag!="") {
                    $tags_demand_arrs[] = User::allTags()->where('slug', $tag)->first();

                }
            }
            $user->tags_demand = null;
            $user->tags_demand =$tags_demand_arrs;

        }



        return response()->json($user);
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

        // Просмотр чужого профиля
        $currentUser = Auth::user();
        if ($user->id != $currentUser->id) {
            Statistics::create([
                'city'     => $currentUser->city->name ?? 'unknown',
                'user_id'  => $user->id,
                'guest_id' => $currentUser->id,
            ]);
        }

        //Похожие компании
        $user->similars = User::select('id','name','avatar','specialization','options')->withTag($user->tags->implode('slug', ', '))
            ->where('city_id', $user->city_id)
            ->where('id', '!=',$user->id)
            ->limit(5)
            ->get();


        // Отзывы
        $user->reviews = $user->reviews()->with([
            'author' => function($query){
                $query->select(['id','name','avatar','specialization']);
            }
        ])->limit(3)
          ->orderByDesc('created_at')
          ->get();


        // Лайк
        $user->fave = $user->liked();

        //Заполненость профиля
        $user->occupancy = 0;
        foreach ($user->attributesToArray() as $item) {
            if (is_null($item) || empty($item)) {
                $user->occupancy++;
            }
        }
        if($user->tags_demand){
            $tags_demand = [];
            $tags_demand = explode ( ",", $user->tags_demand);
            $tags_demand_arrs=[];
            foreach ($tags_demand as $tag) {
                if ($tag!="") {
                    $tags_demand_arrs[] = User::allTags()->where('slug', $tag)->first();

                }
            }
            $user->tags_demand = null;
            $user->tags_demand =$tags_demand_arrs;

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


        if ($account->has('newAvatar')) {
            $img = Image::make($account->get('newAvatar'));
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

        if ($account->has('tags')) {
            $tags = [];
            foreach ($account->get('tags') as $item) {
                array_push($tags, $item['slug']);
            }
            $user->setTags($tags);
        }

        if($account->has('tags_demand')){
            $tags_demand = "";
            foreach ($account->get('tags_demand') as $key=>$item) {
                if($key>0){
                    $tags_demand = ','.$tags_demand;
                }
                $tags_demand.=$item['slug'];


            }
            $account['tags_demand'] = $tags_demand;



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
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function companies(Request $request)
    {

        $companies = User::select('id','name','avatar','specialization','options')->with('tags')->orderBy('created_at', 'DESC');

        if ($request->get('tags')) {
            $companies->whereTag($request->get('tags'));
        }

        $historyTags = $this->prepareTags($request->get('tags'));
        foreach ($historyTags as $item){
            $city_id = null;
            if ($request->get('city')){
                $city = $request->get('city');
                $city_id = $city['id'];
            }

            $search = Search::firstOrCreate([
                'tags' => $item,
                'user_id' => Auth::id(),
                'city_id' => $city_id,
            ],[
                'tags' => $item,
                'user_id' => Auth::id(),
                'city_id' => $city_id,
            ]);
            $search->touch();
            $search->save();
        }

        if ($request->get('city')) {
            $companies->where('city_id', $request->get('city'));
        }

        $companies = $companies->paginate(15);

        return response()->json($companies);
    }


    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function statistics()
    {
        $currentUser = Auth::user();

        $timeStatics = Cache::remember('statics-' . $currentUser->id, Carbon::now()->addHour(),
            function () use ($currentUser) {
                $statics['time'] =  Statistics::select(DB::raw("DATE_FORMAT(`created_at`, '%d') as dat,COUNT('id') as count "))
                    ->where('created_at', '>', Carbon::now()->subDays(30))
                    ->where('user_id', $currentUser->id)
                    ->groupBy('dat')
                    ->orderBy('dat', 'DESC')
                    ->get();

                $statics['city'] = Statistics::select(DB::raw("DATE_FORMAT(`created_at`, '%d') as dat,COUNT('id') as count,city"))
                    ->where('created_at', '>', Carbon::now()->subDays(30))
                    ->where('user_id', $currentUser->id)
                    ->groupBy('dat','city')
                    ->orderBy('count', 'DESC')
                    ->limit(5)
                    ->get();

                return $statics;
            });

        $timeStatics['render'] = true;
        if($timeStatics['city']->count() < 1 && $timeStatics['time']->count() < 1){
            $timeStatics['render'] = false;
        }

        return response()->json($timeStatics);

    }


    /**
     * Рекомендации
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function recommended(Request $request){

        $user = Auth::user();
        $tags = $user->tags()->pluck('slug');


        $search = Search::whereIn('tags',$tags)
            ->select('user_id')
            ->where('user_id','!=',$user->id)
            ->with('user.tags')
            ->orderBy('updated_at', 'DESC')
            ->whereBetween('updated_at', [Carbon::now()->subDays(60), Carbon::now()]);

        if ($request->get('city')) {
            $search = $search->where('city_id', $request->get('city'));
        }

        return response()->json($search->paginate());
    }


    /**
     * Спрос и предложеение
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function supplyAndDemand(Request $request){
        $user = Auth::user();


        $demand = User::select('id','name','avatar','specialization','options')->withTag($user->tags_demand)
            ->where('id', '!=',$user->id);
        if ($request->get('city')) {
            $demand = $demand->where('city_id', $request->get('city'));
        }
        $demand = $demand->paginate();




        $tags = $user->tags()->pluck('slug');
        //var_dump(!empty($tags));
        //die('sdfdsf');


        $supply = [];
        if(isset($tags[0])){
            $supply =  User::select('id','name','avatar','specialization','options')->where('tags_demand', 'like', '%' . $tags[0] . '%');
            for ($i  = 1; $i< count($tags); $i++ ){
                $supply = $supply->orWhere('tags_demand', 'like', '%' . $tags[$i] . '%');
            }
            if ($request->get('city')) {
                $supply = $supply->where('city_id', $request->get('city'));
            }
            $supply = $supply->where('id', '!=',$user->id)->paginate();
        }



        // $tags = City::where('name', 'like', '%' . $city . '%')->limit(10)->get();
        return response()->json(['demand'=> $demand, 'supply' => $supply]);

    }





    /**
     * @param $tags
     *
     * @return array
     */
    private function prepareTags($tags)
    {
        if (is_null($tags)) {
            return [];
        }

        if (is_string($tags)) {
            $delimiter = preg_quote(',', '#');

            $tags = array_map('trim',
                preg_split("#[{$delimiter}]#", $tags, null, PREG_SPLIT_NO_EMPTY)
            );
        }

        return array_unique(array_filter($tags));
    }


}
