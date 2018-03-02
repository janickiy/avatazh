<?php

defined('CP') || exit('CarPrices: access denied.');

class Model_cars extends Model
{
    /**
     * @return mixed
     */
    public function getAllCars()
    {
        $query = "SELECT * FROM " . core::database()->getTableName('cars') . " ORDER BY name";
        $result = core::database()->querySQL($query);
        return core::database()->getColumnArray($result);
    }

    /**
     * @param $car_id
     * @return mixed
     *
     *
     */
    public function getModels($car_id)
    {
        if (is_numeric($car_id)) {
            $query = "SELECT * FROM " . core::database()->getTableName('model') . " WHERE car_id=" . $car_id;
            $result = core::database()->querySQL($query);
            return core::database()->getColumnArray($result);
        }
    }

    /**
     * @param $activate
     * @return mixed
     */
    public function deleteModels($activate)
    {
        $temp = [];

        foreach ($activate as $id) {
            if (is_numeric($id)) {
                $temp[] = $id;
            }
        }

        return core::database()->delete(core::database()->getTableName('model'), "id IN (" . implode(",", $temp) . ")");
    }
}