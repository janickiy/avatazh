<?php

defined('CP') || exit('CarPrices: access denied.');

class Model_edit_shop extends Model
{
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

    /**
     * @param $fields
     * @param $id
     * @return mixed
     */
    public function editShop($fields,$id)
    {
        if (is_numeric($id)) {
            return core::database()->update($fields, core::database()->getTableName('shops'), "id=" . $id);
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getShopById($id)
    {
        if (is_numeric($id)) {
            $query = "SELECT * FROM ".core::database()->getTableName('shops')." WHERE id=" . $id;
            $result = core::database()->querySQL($query);
            return core::database()->getRow($result);
        }
    }
}