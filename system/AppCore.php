<?php

require './core.php';


class AppCore{

    static protected $dbObj;

    public function __construct()
    {
        $this->initDB();
        $this->initOptions();
        RequestHandler::handle();
    }


    /**
     * Inicijalizacija baze
     */
    public function initDB()
    {
        require('/Applications/XAMPP/xamppfiles/htdocs/exchange-rate-project/system/config.inc.php');
        require('/Applications/XAMPP/xamppfiles/htdocs/exchange-rate-project/system/model/MySQLiDatabase.class.php');

        self::$dbObj = new MySQLiDatabase(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    }

    public static final function getDB(){
        return self::$dbObj;
    }

    public function initOptions(){
        require './options.inc.php';
    }

    public static function autoLoad($class){
        file_exists($class) ? require_once './system/util' . $class . '.php' : print('Klasa ne postoji!');
    }
}


?>