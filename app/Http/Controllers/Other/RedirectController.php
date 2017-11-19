<?php

namespace App\Http\Controllers\Other;

use App\Core\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RedirectController extends Controller
{


    /**
     * @param User $user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function directions(User $user){

        $saddr = Auth::user()->address;
        $daddr = $user->address;
        return redirect()->to("http://maps.google.com/maps?saddr=$saddr&daddr=$daddr");
    }



}
