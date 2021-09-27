<?php

    class Login_check extends Dbase{
    
        public function login($username, $password){
    
            $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
            $result = $this->connect()->query($sql);
            while($row = $result->fetch()){
                $data[] = $row; 
            }
            return $data;
        }

    }
?>