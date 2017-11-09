<?php

namespace App\Core\Models;
use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    /**
     * @var string
     */
    protected $table = 'search';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tags',
        'user_id',
        'city_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
