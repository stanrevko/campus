<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FiltersHelper
 *
 * @author Stanislav
 */
class FiltersHelper {

    //put your code here
    private static $tables = array('subject', 'teacher', 'type', 'kind');

    public static function getTableContent($tableName) {
//        $dependency = new CDbCacheDependency('SELECT MAX(update_time) FROM tbl_post');
        return Yii::app()->db->createCommand()->select('*')->from("{$tableName}")->queryAll();
    }

    public static function getTables() {
        $result = array();
        $id = "FilterTables";
        $result = Yii::app()->cache->get($id);
        if ($result === false) {
            // оновлюємо $value, тому що змінна не знайдена у кеші,
            // і зберігаємо в кеш для подальшого використання:
            foreach (self::$tables as $key => $value) {
                $tableName = is_array($value) ? $key : $value;
                $result[$tableName] = self::getTableContent($tableName);
            }
        }

        Yii::app()->cache->set($id, $result);
        return $result;
    }        
}

?>
