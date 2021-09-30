<?php 

class Dbase{

    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "users";

    
    protected function connect(){
        try{
            $dsn = "mysql:host=".$this->servername.";dbname=".$this->dbname;
            $pdo = new PDO($dsn,$this->username,$this->password);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
        }
        catch(PDOException $e){
            echo "Connection Failed: ".$e->getMessage();
        }
    }
    public function execute(){
        $this->connect()->execute();
        return $this->connect();
    }
   
    
}
