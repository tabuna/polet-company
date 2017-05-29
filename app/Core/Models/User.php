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



}
