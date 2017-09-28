<?php

namespace App\Core\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Reviews extends Model
{
    protected $table = 'reviews';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'text',
        'reviewable_id',
        'reviewable_type',
        'author_id',
        'author_type'
    ];

    /**
     * @return MorphTo
     */
    public function reviewable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * @return MorphTo
     */
    public function author(): MorphTo
    {
        return $this->morphTo('author');
    }

    /**
     * @param Model $reviewable
     * @param       $data
     * @param Model $author
     *
     * @return bool
     */
    public function createReview(Model $reviewable, $data, Model $author): bool
    {
        $review = new static();
        $review->fill(array_merge($data, [
            'author_id'   => $author->id,
            'author_type' => get_class($author),
        ]));

        return (bool) $reviewable->reviews()->save($review);
    }

    /**
     * @param $id
     * @param $data
     *
     * @return bool
     */
    public function updateReview($id, $data): bool
    {
        return (bool) static::find($id)->update($data);
    }

    /**
     * @param $id
     *
     * @return bool
     */
    public function deleteReview($id): bool
    {
        return (bool) static::find($id)->delete();
    }

}
