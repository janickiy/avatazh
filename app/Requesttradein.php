<?php

namespace App;

use App\BaseModel;

class Requesttradein extends BaseModel
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
    protected $dates = ['published_at'];

}