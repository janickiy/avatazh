<?php

namespace App;

use App\BaseModel;
/**
 * @property array|string name
 * @property array|string status
 */
class Feature extends BaseModel
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * @param $query
     * @return mixed
     */
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    /**
     * @return string
     */
    public function getStatusAttribute()
    {
        return $this->attributes['status'] ? 'active' : 'inactive';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Packages()
    {
        return $this->belongsToMany(Package::class)->withPivot('spec')->withTimestamps();
    }

    /**
     * @return bool
     */
    public function isActive()
    {
        return $this->attributes['status'] ? true : false;
    }
}
