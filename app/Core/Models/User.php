<?php

namespace App\Core\Models;

use App\Core\Traits\Rateable;
use App\Notifications\ResetPasswordNotification;
use Cartalyst\Tags\TaggableTrait;
use Cmgmyr\Messenger\Traits\Messagable;
use Conner\Likeable\LikeableTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Orchid\Platform\Core\Models\User as UserOrchid;

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
        'options',
        'search_tags',
    ];

    /**
     * @var array
     */
    protected $with = [
        'tags',
        'city',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'options'     => 'array',
        'permissions' => 'array',
        'search_tags' => 'array',
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
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews()
    {
        return $this->hasMany(Reviews::class, 'reviewable_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function history()
    {
        return $this->hasMany(Search::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lookedUser()
    {
        return $this->hasMany(Statistics::class, 'user_id')
            ->select('user_id','guest_id')
            ->orderByDesc('created_at')
            ->where('guest_id', '=', Auth::id());
    }
}
