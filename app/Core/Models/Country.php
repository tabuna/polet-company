<?php

namespace App\Core\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'country';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getCity()
    {
        return $this->hasMany(City::class);
    }


}
