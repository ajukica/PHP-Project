<?php


class MySQLiDatabase
{
    public $MySQLi;
    protected $host;
    protected $user;
    protected $password;
    protected $database;
    protected $charset = '';
    protected $queryCount = 0;

    public function __construct($host,$user,$password,$database,$charset='utf-8'){
            $this -> host = $host;
            $this -> user = $user;
            $this -> password = $password;
            $this -> database = $database;
            $this -> charset = $charset;

            $this -> connect();
    }

    public function connect(){ $this -> MySQLi = new MySQLi(
                                $this -> host,
                                $this -> user,
                                $this -> password,
                                $this -> database);

        if (mysqli_connect_errno()){
            echo 'Conn failed';
        }

    }

    public function selectDB(){
        if ($this -> MySQLi -> selectDB($this -> database) === false){
            echo 'Greška kriva databasaae';
        }

    }

    public function sendQuery($query){
        
        $this -> queryCount ++;
        $this -> result = $this -> MySQLi -> query($query);
        if ($this -> result === false){
            echo 'Invalid SQL';
        }

        return $this -> result;
    }


}

?>