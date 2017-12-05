<?php

namespace App;

use App\BaseModel;

class UserReview extends BaseModel
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
    protected $dates = ['published_at'];

    /**
     * @return string
     */
    public function getPublishedAttribute()
    {
        return $this->attributes['published'] ? 'публикован' : 'не опубликован';
    }
}