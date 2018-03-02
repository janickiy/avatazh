<?php

defined('CP') || exit('CarPrices: access denied.');

class Model_add_shop extends Model
{
    /**
     * @param $fields
     * @return mixed
     */
    public function addShop($fields)
    {
        return core::database()->insert($fields, core::database()->getTableName('shops'));
    }

    /**
     * @param $name
     * @param $url
     * @return bool
     */
    public function checkExistShop($name, $url) {
        $name = trim(core::database()->escape($name));
        $url = trim(core::database()->escape($url));

        $query = "SELECT * FROM " . core::database()->getTableName('shops') . " WHERE name LIKE '" . $name . "' AND url LIKE '" . $url . "'";
        $result = core::database()->querySQL($query);
        return (core::database()->getRecordCount($result) == 0) ? false : true;
    }
}