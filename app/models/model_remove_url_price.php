<?php

defined('CP') || exit('CarPrices: access denied.');

class Model_remove_url_price extends Model
{
    /**
     * @param $str
     * @return mixed
     */
    public function removePrice($id)
    {
        if (is_numeric($id)) {
            return core::database()->delete(core::database()->getTableName('price'), "id=" . $id, '');
        }
    }
}