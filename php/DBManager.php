<?php

class DBManager {
    private $servname = "localhost";
    private $user = "";
    private $password = "";
    private $dbname = "";
    private $conn;


    public function __construct(){
        try {
            $this->conn = new PDO("mysql:host=$this->servname;dbname=$this->dbname", $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $e){
            echo "Error : " . $e->getMessage();
        }
    }

    public function getConn(){
        return $this->conn;
    }

    public function closeConn(){
        $this->conn = null;
    }

}

?>