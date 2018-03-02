<?php

defined('CP') || exit('CarPrices: access denied.');

class Model_add_model extends Model
{
    /**
     * @param $fields
     * @return mixed
     */
    public function addModel($fields)
    {
        return core::database()->insert($fields, core::database()->getTableName('model'));
    }

    public function getCarById($id)
    {
        if (is_numeric($id)) {
            $query = "SELECT * FROM ".core::database()->getTableName('cars')." WHERE id=" . $id;
            $result = core::database()->querySQL($query);
            return core::database()->getRow($result);
        }
    }
}