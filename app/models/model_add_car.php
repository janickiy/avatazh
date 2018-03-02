<?php

defined('CP') || exit('CarPrices: access denied.');

class Model_add_car extends Model
{
    /**
     * @param $fields
     * @return mixed
     */
    public function addCar($fields)
    {
        return core::database()->insert($fields, core::database()->getTableName('cars'));
    }
}