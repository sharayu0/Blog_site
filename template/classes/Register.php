<?php

class Register extends Dbase
{

    public function signup($username, $password)
    {
        $sql = "INSERT INTO users(username, password) VALUES(?,?)";
        $result = $this->connect()->prepare($sql);
        $result->execute([$username, $password]);

        return true;
    }

    public function user_check($username)
    {

        $sql = "SELECT * FROM users WHERE username= '$username'";
        $result = $this->connect()->prepare($sql);
        $result->execute([$username]);
        if ($result->rowCount()) {
            while ($row = $result->fetch()) {
                $data[] = $row;
            }
            return $data;
        }
    }
}
