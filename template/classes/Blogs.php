<?php


$conf['error_level'] = 2;
error_reporting(E_ALL); 
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
ini_set('max_execution_time', '0');


class Blogs extends Dbase{
    
    public function update_blog($imagename,$title,$content,$id){
    
        $sql = "UPDATE blog_data SET image=?, title=?, content=? WHERE id=?";
    
        $result = $this->connect()->prepare($sql);
        
        $res = $result->execute([$imagename,$title,$content,$id]);
      
    }

    public function insert_blog($imagename,$title, $content, $uid){
        $sql = "INSERT INTO blog_data(image,title, content, user_id) VALUES(?,?,?,?)";
        $result = $this->connect()->prepare($sql);
        $result->execute([$imagename,$title, $content, $uid]);

        return true;

    }


    

    public function select_post($id){
        $sql = "SELECT b.id, b.image, b.title, b.content, u.username FROM blog_data b JOIN users u ON b.user_id = u.uid WHERE b.id =?";
        $result = $this->connect()->prepare($sql);
        $result->execute([$id]);

        if($result->rowCount()){
            while($row = $result->fetch()){
                $data[] = $row; 
            }
            return $data ;

        }
    }


    public function delete_blog($id){
        $sql = "DELETE FROM blog_data WHERE id=?";
        $result= $this->connect()->prepare($sql);
        $result->execute([$id]);
    }


}

?>