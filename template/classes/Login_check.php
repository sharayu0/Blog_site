<?php

class Login_check extends Dbase
{

    public function login($username, $password)
    {

        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = $this->connect()->prepare($sql);
        $result->execute([$username, $password]);

        if ($result->rowCount()) {
            while ($row = $result->fetch()) {
                $data[] = $row;
            }
            return $data;
        }
    }
}
