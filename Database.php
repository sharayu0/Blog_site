
<?php 

class Database{

    private $server = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "users";

    private $conn=false;
    private $mysqli="";
    private $result=array();    //to display any result
    
    public function __construct(){
        
        if(!$this->conn){
            $this->mysqli = new mysqli($this->server, $this->username, $this->password, $this->database);
            $this->conn = true;
            
            if($this->mysqli->connect_error){
                print "hello_error";
                array_push($this->result, $this->mysqli->connect_error);

            
            }
        }
    }
    
    public function insert($table,$params=array()){
       
       
         
            $table_column = implode(',',array_keys($params));  // implode() - convert into string from array form 
            $table_value = implode("','",$params);
            print_r($table_value);
            $sql = "INSERT INTO $table ($table_column) VALUES ('$table_value')";

            if($this->mysqli->query($sql)){
                array_push($this->result,$this->mysqli->insert_id);
                return true;
            }else{
                array_push($this->result,$this->mysqli->error);
                return false;
            }
      
    }


    public function update($table, $params=array(), $where = null){
        

            $args = array();
            foreach($params as $key => $value){
                $args[] = "$key = '$value'";
            }
            $sql = "UPDATE $table SET " . implode(', ',$args);
            if($where != null){
                $sql .= " WHERE $where";
            }
            echo $sql;
            
            $this->mysqli->query($sql);
        
    }


    public function delete($table, $where = null){
        
            $sql = "DELETE FROM $table";
            if($where != null){
                $sql .= " WHERE $where";
            }
            
            $this->mysqli->query($sql);
       
    }



   


    public function __destruct(){
        if($this->conn){
            if($this->mysqli->close()){
                $this->conn = false;
                return true;
            }
    }else{
        return false;
    }
}
}


?> 













