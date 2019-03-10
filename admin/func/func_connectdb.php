<?php
    $con='';
    function db_connect(){
        $dsn='mysql:dbname=m3;host=localhost';
        $user='root';
        $pwd='root';
        $option=array(PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC);
        try{
            global $con;
            $con=new PDO($dsn,$user,$pwd,$option);
            //echo "successful";
        }
        catch(PEOException $e){
            echo 'connection fail'.$e->message();
        }
    }
?>