<?php

namespace App\Core\Models;

use Illuminate\Database\Eloquent\Model;

class Statistics extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'statistics';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'city',
        'guest_id',
        'user_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
