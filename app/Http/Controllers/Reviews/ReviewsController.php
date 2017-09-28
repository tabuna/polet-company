<?php
/**
 * Created by PhpStorm.
 * User: selena
 * Date: 26.09.17
 * Time: 23:21
 */

namespace App\Http\Controllers\Reviews;
use App\Core\Models\User;
use App\Core\Models\Reviews;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;


class ReviewsController extends Controller
{
    public function index(){
        $reviews = Reviews::all()->latest('updated_at')->paginate();
        return response()->json($reviews);
    }



    public function show( $user_id){
        $reviews = Reviews::with([
            'from_users'    => function ($query) {
                $query->select('avatar', 'name', 'agent_name');
            }
        ])->where('to_user_id', $user_id)->latest('updated_at')->paginate(5);
        //$reviews->to_user=User::select('avatar', 'name', 'agent_name')->where('id',$user_id)->first();
        return response()->json($reviews);
    }

    public function store(Request $request)
    {
        //dd($request);


        Reviews::create([
            'to_user_id' => $request->get('to_user_id'),
            'from_user_id'   => Auth::user()->id,
            'text'      => $request->get('review_text'),
        ]);

        $reviews = Reviews::where('to_user_id', $request->get('to_user_id'))->with([
        'from_users'    => function ($query) {
            $query->select('avatar', 'name', 'agent_name');
        }
    ])->latest('updated_at')->paginate(5);
        //$reviews->to_user=User::select('avatar', 'name', 'agent_name')->where('id', $request->get('to_user_id'))->first();






        return response()->json($reviews);


    }



}