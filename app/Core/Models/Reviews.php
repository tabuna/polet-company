<?php
/**
 * Created by PhpStorm.
 * User: selena
 * Date: 26.09.17
 * Time: 21:50
 */

namespace App\Core\Models;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    protected $table = 'reviews';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'from_user_id',
        'to_user_id',
        'text'
    ];
    public function to_user()
    {
        return $this->belongsTo(User::class, 'to_user_id');
    }
    public function from_users()
    {
        return $this->belongsTo(User::class, 'from_user_id');
    }


}