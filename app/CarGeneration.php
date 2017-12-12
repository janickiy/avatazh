<?php

namespace App;

use App\BaseModel;

class CarGeneration extends BaseModel
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
    public function carModel()
    {
        return $this->belongsTo(CarModel::class, 'id_car_model');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function carSeries()
    {
        return $this->hasMany(CarSerie::class, 'id_car_generation');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function carType()
    {
        return $this->belongsTo(CarType::class, 'id_car_type');
    }
}