<?php

namespace App\Core\Models;

use Cartalyst\Tags\TaggableTrait;
use Conner\Likeable\LikeableTrait;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPasswordNotification;
use Orchid\Core\Models\User as UserOrchid;
use willvincent\Rateable\Rateable;

class User extends UserOrchid
{
    use Notifiable, TaggableTrait, LikeableTrait, Rateable;

    /**
     * @var string
     */
    protected $table = 'users';

    /**
     * @var array
     */
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
        'website',
        'avatar'
    ];


    /**
     * Send the password reset notification.
     *
     * @param  string $token
     *
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    /**
     * @return mixed|string
     */
    public function getAvatar() : string
    {
        if (empty($this->avatar) || is_null($this->avatar)) {
            return '/img/avatar.png';
        }

        return $this->avatar;
    }


}
