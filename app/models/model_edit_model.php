<?php

defined('CP') || exit('CarPrices: access denied.');

class Model_edit_model extends Model
{
    /**
     * @param $fields
     * @param $id
     * @return mixed
     */
    public function updateModel($fields, $id)
    {
        if (is_numeric($id)) {
            return core::database()->update($fields, core::database()->getTableName('model'), "id=" . $id);
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getModel($id)
    {
        if (is_numeric($id)) {
            $query = "SELECT * FROM " . core::database()->getTableName('model') . " WHERE id=" . $id;
            $result = core::database()->querySQL($query);
            return core::database()->getRow($result);
        }
    }
}