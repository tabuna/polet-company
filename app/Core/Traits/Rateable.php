<?php

namespace App\Core\Traits;

use App\Core\Models\Rating;
use Illuminate\Support\Facades\Auth;

trait Rateable
{
    /**
     * This model has many ratings.
     *
     * @return Rating
     */
    public function ratings()
    {
        return $this->morphMany(Rating::class, 'rateable');
    }

    /**
     * @return mixed
     */
    public function averageRating()
    {
        return $this->ratings()->avg('rating');
    }

    /**
     * @return mixed
     */
    public function sumRating()
    {
        return $this->ratings()->sum('rating');
    }

    /**
     * @return mixed
     */
    public function userAverageRating()
    {
        return $this->ratings()->where('user_id', Auth::id())->avg('rating');
    }

    /**
     * @return mixed
     */
    public function userSumRating()
    {
        return $this->ratings()->where('user_id', Auth::id())->sum('rating');
    }

    /**
     * @param int $max
     *
     * @return float|int
     */
    public function ratingPercent($max = 5)
    {
        $quantity = $this->ratings()->count();
        $total = $this->sumRating();

        return ($quantity * $max) > 0 ? $total / (($quantity * $max) / 100) : 0;
    }

    /**
     * @return mixed
     */
    public function getAverageRatingAttribute()
    {
        return $this->averageRating();
    }

    /**
     * @return mixed
     */
    public function getSumRatingAttribute()
    {
        return $this->sumRating();
    }

    /**
     * @return mixed
     */
    public function getUserAverageRatingAttribute()
    {
        return $this->userAverageRating();
    }

    /**
     * @return mixed
     */
    public function getUserSumRatingAttribute()
    {
        return $this->userSumRating();
    }
}
