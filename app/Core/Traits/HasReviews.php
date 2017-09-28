<?php

namespace App\Core\Traits;

use App\Core\Models\Reviews;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasReviews
{
    /**
     * @return MorphMany
     */
    public function reviews(): MorphMany
    {
        return $this->morphMany(Reviews::class, 'reviewable');
    }

    /**
     * @param            $data
     * @param Model      $author
     *
     * @return bool
     */
    public function createReview($data, Model $author): bool
    {
        return $this->getReviewModel()->createReview($this, $data, $author);
    }

    /**
     * @param            $id
     * @param            $data
     *
     * @return bool
     */
    public function updateReview($id, $data): bool
    {
        return $this->getReviewModel()->updateReview($id, $data);
    }

    /**
     * @param $id
     *
     * @return bool
     */
    public function deleteReview($id): bool
    {
        return $this->getReviewModel()->deleteReview($id);
    }

    /**
     * @return Model
     */
    protected function getReviewModel(): Model
    {
        $model = Reviews::class;

        return new $model();
    }
}
