<?php
/**
 * 单例模式
 * @author ChenHao <dzswchenhao@126.com>
 * @since 1.0
 * **********
 * *  要点          *
 * **********
 * 1、某个类只能有一个实例；
 * 2、它必须自行创建这个实例
 * 3、它必须自行向整个系统提供这个实例
 */

class DB {
    private static $_instance;
    private function __construct($config=[]) {
        //Init eg:Link DB
        
    }
    public static function instance($config=[]) {
        if(self::$_instance===null) {
            self::$_instance = new DB($config);
        }
        return self::$_instance;
    }
    public function query() {
        //do something
        
    }
    /**
     * 也可以将 clone 方法声明为 private，防止克隆单例
     * @return void
     */
    public function __clone() {
        throw new \Exception('Clone is not allow');
    }
    /**
     * 把反序列化方法声明为 private，防止反序列化单例
     * @return void
     */
    private function __wakeup()
    {
    }
}

//False
//$db = new DB();

//True
$db = DB::instance();
$db->query();

//copy DB object will throw exception
//$db2 = clone $db;


//2016-11-04 11:11