<?php

$conf['error_level'] = 2;
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
ini_set('max_execution_time', '0');

spl_autoload_register(function ($class) {
    require_once($class . '.php');
});


class User extends Dbase
{


    public function check_user($username)
    {
        $sql = "SELECT * FROM users where username=?";
        $result = $this->connect()->query($sql);
        while ($row = $result->fetch()) {
            $data[] = $row;
        }
        return $data;
    }

    public function selectUser($uid)
    {
        $sql = "SELECT * FROM users where uid=?";
        $result = $this->connect()->prepare($sql);
        $result->execute([$uid]);

        if ($result->rowCount()) {
            while ($row = $result->fetch()) {
                $data[] = $row;
            }
            return $data;
        }
    }


    public function updateUser($username, $usertype, $uid)
    {
        $sql = "UPDATE users SET username=?, usertype=? WHERE uid=?";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$username, $usertype, $uid]);
        return $stmt;
    }

    public function deleteUser($uid)
    {
        $sql = "DELETE FROM users where uid=?";
        $result = $this->connect()->prepare($sql);
        $result->execute([$uid]);
    }

    public function getAdminPost()
    {
        $limit = 10;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;

        $start = ($page - 1) * $limit;

        $sql = "SELECT b.id,b.image, b.title, u.username FROM blog_data b JOIN users u ON b.user_id = u.uid ORDER BY b.id LIMIT $start, $limit";

        $result = $this->connect()->query($sql);

        $res = $result->rowCount();
        if ($res) {
            while ($row = $result->fetch()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function getCount()
    {
        $sql = "SELECT b.id,b.image, b.title, u.username FROM blog_data b JOIN users u ON b.user_id = u.uid ORDER BY b.id";
        $result = $this->connect()->query($sql);
        $res = $result->rowCount();


        if ($res) {
            $total = $res;
            $limit = 10;
            $pages = ceil($total / $limit);
        }
        return $pages;
    }


    public function getAllUser()
    {
        $limit = 9;
        $user_page = isset($_GET['user_page']) ? $_GET['user_page'] : 1;

        $start = ($user_page - 1) * $limit;
        $sql = "SELECT * FROM users LIMIT $start, $limit";
        $result = $this->connect()->query($sql);
        $res = $result->rowCount();
        if ($res) {
            while ($row = $result->fetch()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function getCountUser()
    {
        $sql = "SELECT * FROM users";
        $result = $this->connect()->query($sql);
        $res = $result->rowCount();

        if ($res) {
            $total = $res;
            $limit = 9;
            $pages = ceil($total / $limit);
        }
        return $pages;
    }



    public function all_post()
    {
        $sql = "SELECT b.id, b.image, b.title, b.content, u.username FROM blog_data b JOIN users u ON b.user_id = u.uid ORDER BY b.id DESC";
        $result = $this->connect()->query($sql);
        while ($row = $result->fetch()) {
            $data[] = $row;
        }
        return $data;
    }


    public function user_post($uid)
    {
        $sql = "SELECT b.id, b.image, b.title, b.content, u.username FROM blog_data b JOIN users u ON b.user_id = u.uid WHERE user_id =? ORDER BY b.id DESC";
        $result = $this->connect()->prepare($sql);
        $result->execute([$uid]);

        if ($result->rowCount()) {
            while ($row = $result->fetch()) {
                $data[] = $row;
            }
            return $data;
        }
    }
}
