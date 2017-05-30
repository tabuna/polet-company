<?php

namespace App\Core\Models;

use Illuminate\Notifications\Notifiable;
use Orchid\Core\Models\User as UserOrchid;

class User extends UserOrchid

{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'permissions',
        'about',
        'phone',
        'address',
        'inn',
        'type_of_activity',
        'ogrn',
        'website'
    ];

    public function getAvatar()
    {
        if (empty($this->avatar) || is_null($this->avatar)) {
            return '/img/no_avatar.png';
        }

        return $this->avatar;
    }



}
