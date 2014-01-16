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
        $dataReader = Yii::app()->db->createCommand()->select('*')->from("{$tableName}")->query();
        while (($row = $dataReader->read()) !== false) {
            $result[$row['id']] = $row;
        }
        return $result;
    }

    public static function getTables() {
        $result = false;
        $id = "FilterTables";
        //$result = Yii::app()->cache->get($id);
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

    public static function getTerms() {
        $year = 1;
        for ($i = 1; $i < 12; $i++) {
            if ($i % 2 == 0)
                ++$year;
            $terms[$i] = $i . " - Курс $year/" . ($i % 2 + 1);
        }
        return $terms;
    }

    public static function getYears() {
        $start = mktime(0, 0, 0, 1, 1, 2009);
        $stop = time(date("Y"));

        for ($temp = $start; $temp < $stop; $temp += 86400 * 365) {
            $year = date('Y', $temp);
            $years[$year] = $year;
        }
        return $years;
    }

}

?>
