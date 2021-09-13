<?php

$conf['error_level'] = 2;
error_reporting(E_ALL); 
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
ini_set('max_execution_time', '0');

spl_autoload_register(function($class){
    require_once($class.'.php');
}); 


class User extends Dbase{

    public function check_user($username){
        $sql = "SELECT * FROM users where username=?"; 
        $result = $this->connect()->query($sql);
        while($row = $result->fetch()){
            $data[] = $row; 
        }
        return $data;
    }

    public function selectUser($uid){
        $sql = "SELECT * FROM users where uid=?"; 
        $result = $this->connect()->prepare($sql);
        $result->execute([$uid]);

        if($result->rowCount()){
            while($row = $result->fetch()){
                $data[] = $row; 
            }
            return $data ;

        }
    }


    public function updateUser($username,$password,$usertype,$uid){
        $sql = "UPDATE users SET username=?, password=?, usertype=? WHERE uid=?";

        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username,$password,$usertype,$uid]); 
    }


    public function getAllUser(){
        $sql = "SELECT * FROM users";
        $result = $this->connect()->query($sql); 
        while($row = $result->fetch()){
        $data[] = $row; 
        }
        return $data ; 
    }

    public function deleteUser($uid){
        $sql = "DELETE FROM users where uid=?";
        $result = $this->connect()->prepare($sql);
        $result->execute([$uid]);
    }

    public function getAdminPost(){
        $sql = "SELECT b.id,b.image, b.title, u.username FROM blog_data b JOIN users u ON b.user_id = u.uid ORDER BY b.id";
        $result = $this->connect()->query($sql); 
        while($row = $result->fetch()){
        $data[] = $row; 
        }
        return $data ; 
    }


    public function all_post(){
        $sql = "SELECT * FROM blog_data ORDER BY id DESC";
        $result = $this->connect()->query($sql); 
        while($row = $result->fetch()){
        $data[] = $row; 
        }
        return $data ; 
    }


    public function user_post($uid){
        $sql = "SELECT * FROM blog_data WHERE user_id =? ORDER BY id DESC";
        $result = $this->connect()->prepare($sql);
        $result->execute([$uid]);

        if($result->rowCount()){
            while($row = $result->fetch()){
                $data[] = $row; 
            }
            return $data ;

        }
    }
}

?>