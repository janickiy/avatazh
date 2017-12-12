<?php

namespace App;

use App\BaseModel;

class CarSerie extends BaseModel
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function carGeneration()
    {
        return $this->belongsTo(CarGeneration::class, 'id_car_generation');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function carType()
    {
        return $this->belongsTo(CarType::class, 'id_car_type');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function carModifications()
    {
        return $this->hasMany(CarModification::class, 'id_car_serie');
    }
}
