`<?php 

class Database{

    private $server = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "users";

    private $conn=false;
    private $mysqli="";
    private $result=array();    //to display any result
    
    public function connect(){

        $this->mysqli = new mysqli($this->server, $this->username, $this->password, $this->database);

        return $this->mysqli;
        
    }
    
    // public function insert($table,$params=array()){
       
            
    //         $table_column = implode(',',array_keys($params));  // implode() - convert into string from array form 
    //         $table_value = implode("','",$params);
    //         print_r($table_value);
    //         $sql = "INSERT INTO $table ($table_column) VALUES ('$table_value')";

           
      
    // }


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

    public function select($table,$rows="*",$join = null, $where= null, $order=null,$limit=null){
        $sql = "SELECT $rows FROM $table";
        if($join != null){
            $sql .= " JOIN $join";
        }
        if($where != null){
            $sql .= " WHERE $where";
        }
        if($order != null){
            $sql .= " ORDER BY $order";
        }
        if($limit != null){
            $sql .= " LIMIT 0, $limit";
        }


        $query = $this->mysqli->query($sql);
        if($query){
            $this->result = $query->fetch_all(MYSQLI_ASSOC);
            return true;
        }else{
            array_push($this->result, $this->mysqli->error);
            return false ;
        }   
        echo $sql;

    }

    public function sql($sql){
        $query = $this->mysqli->query($sql);
        if($query){
            $this->result = $query->fetch_all(MYSQLI_ASSOC);
            return true;
        }else{
            array_push($this->result, $this->mysqli->error);
            return false ;
        }   
    }





    // public function delete($table, $where = null){
        
    //         $sql = "DELETE FROM $table";
    //         if($where != null){
    //             $sql .= " WHERE $where";
    //         }
            
    //         $this->mysqli->query($sql);
       
    // }



   


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













