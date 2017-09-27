<?php

namespace App\Core\Models;

use Cartalyst\Tags\TaggableTrait;
use Conner\Likeable\LikeableTrait;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPasswordNotification;
use Orchid\Platform\Core\Models\User as UserOrchid;
use Cmgmyr\Messenger\Traits\Messagable;
use App\Core\Traits\Rateable;

class User extends UserOrchid
{
    use Notifiable, TaggableTrait, LikeableTrait, Messagable, Rateable;

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
        'avatar',
        'agent_name',
        'specialization',
        'size_company',
        'city_id',
        'options'
    ];

    /**
     * @var array
     */
    protected $casts = [
        'options' => 'array',
        'permissions' => 'array'
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


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city(){
        return $this->belongsTo(City::class);
    }


}
