<?php

namespace App;

use App\BaseModel;

class CarMark extends BaseModel
{
    /**
     * The primary column associated with the table
     *
     * @var string
     */
    protected $guarded = ['id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function carType()
    {
        return $this->belongsTo(CarMark::class, 'id_car_type');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function carModels()
    {
        return $this->hasMany(CarModel::class, 'id_car_mark');
    }
}
