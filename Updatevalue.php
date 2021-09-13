<?php


$conf['error_level'] = 2;
error_reporting(E_ALL); 
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
ini_set('max_execution_time', '0');

spl_autoload_register(function($class){
    require_once($class.'.php');
});


class Updatevalue extends Dbase{

    public function update($imagename, $title, $content, $id){

        $sql = "UPDATE blog_data SET imagename=?, title=?, content=? WHERE id=?";

        $result = $this->connect()->prepare($sql);

        $result->execute([$imagename, $title, $content, $id]);

    }
     
}

?>