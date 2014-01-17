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
    public static $_tables = false;
    //put your code here
    private static $tableNames = array('subject', 'teacher', 'type', 'kind');

    public static function getTableContent($tableName) {
//        $dependency = new CDbCacheDependency('SELECT MAX(update_time) FROM tbl_post');
        $dataReader = Yii::app()->db->createCommand()->select('*')->from("{$tableName}")->query();
        while (($row = $dataReader->read()) !== false) {
            $result[$row['id']] = $row;
        }
        return $result;
    }

    public static function getTables() {
        self::$_tables = false;
        $id = "FilterTables";
        //self::$_tables = Yii::app()->cache->get($id);
        if (self::$_tables === false) {
            // оновлюємо $value, тому що змінна не знайдена у кеші,
            // і зберігаємо в кеш для подальшого використання:
            foreach (self::$tableNames as $key => $value) {
                $tableName = is_array($value) ? $key : $value;
                self::$_tables[$tableName] = self::getTableContent($tableName);
            }
        }

        Yii::app()->cache->set($id, self::$_tables);
        return self::$_tables;
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
    
    public static function getStates(){
        $result = array();
        $result[-2] = 'Забраковано';
        $result[-1] = 'Видалено';
        $result[0] = 'Чорновик';
        $result[1] = 'Очікує публікації';
        $result[2] = 'Опубліковано';
        
        return $result;
    }

}

?>
