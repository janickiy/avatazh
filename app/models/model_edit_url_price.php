<?php

defined('CP') || exit('CarPrices: access denied.');

class Model_edit_url_price extends Model
{
    /**
     * @param $fields
     * @param $id
     * @return mixed
     */
    public function updateUrlPrice($fields,$id)
    {
        if (is_numeric($id)) {
            return core::database()->update($fields, core::database()->getTableName('price'), "id=" . $id);
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getPriceByInfo($id)
    {
        if (is_numeric($id)) {
            $query = "SELECT * FROM ".core::database()->getTableName('price')." WHERE id=" . $id;
            $result = core::database()->querySQL($query);
            return core::database()->getRow($result);
        }
    }
}