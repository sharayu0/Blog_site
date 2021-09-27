<?php
spl_autoload_register('myAutoLoad');

function myAutoLoad($className){
    $extension = ".php";
    $fullpath = $className . $extension;
    
    include $fullpath;
}
?>