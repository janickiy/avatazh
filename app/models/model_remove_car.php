<?php

defined('CP') || exit('CarPrices: access denied.');

class Model_remove_car extends Model
{
    /**
     * @param $str
     * @return mixed
     */
    public function removeCar($id)
    {
        if (is_numeric($id)) {

            $result = core::database()->delete(core::database()->getTableName('cars'), "id=" . $id, '');

            if ($result) {
                core::database()->delete(core::database()->getTableName('model'), "car_id=" . $id, '');
            }
        }
    }
}