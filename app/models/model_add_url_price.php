<?php

defined('CP') || exit('CarPrices: access denied.');

class Model_add_url_price extends Model
{
    /**
     * @param $url
     * @return mixed
     */
    public function getShopId($url)
    {
        $url = parse_url($url, PHP_URL_HOST);
        if ((substr($url, 0, 4)) == "www.") $url = str_replace('www.','',$url);
        $query = "SELECT id FROM " . core::database()->getTableName('shops') . " WHERE url LIKE '%" . $url . "%'";
        $result = core::database()->querySQL($query);

        if (core::database()->getRecordCount($result) > 0) {
            $row = core::database()->getRow($result);
            return $row['id'];
        } else {
            $fields = [
                'id' => 0,
                'name' => $url,
                'url' => $url
            ];

            return core::database()->insert($fields, core::database()->getTableName('shops'));
        }
    }

    /**
     * @param $fields
     * @return mixed
     */
    public function addUrlPrice($fields)
    {
        return core::database()->insert($fields, core::database()->getTableName('price'));
    }

    /**
     * @param $shop_id
     * @param $model_id
     * @return bool
     */
    public function checkExistPrice($shop_id, $model_id)
    {
        if (is_numeric($shop_id) && is_numeric($model_id)) {
            $query = "SELECT * FROM " . core::database()->getTableName('price') . " WHERE shop_id=" . $shop_id . " AND model_id=" . $model_id;
            $result = core::database()->querySQL($query);

            if (core::database()->getRecordCount($result) > 0) {
                return true;
            } else {
                return false;
            }
        }
    }
}