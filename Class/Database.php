<?php
Class Database{
    public $conn;
    public function __construct(){
        $this->conn = new mysqli('localhost','u320585682_petbook','Mysqlphp1','u320585682_petbook');
}
}
// l89.117.157.241 
?>