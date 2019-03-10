<?php
    function get_all_categories(){
        global $con;
        $sql="SELECT * FROM `tbl_category`";
        $result=$con->query($sql)->fetchAll();
        return $result;
    }

    function get_category_by_name($name){
        global $con;
        $sql="SELECT * FROM `tbl_category` WHERE `cat_name`='".$name."'";
        $result=$con->query($sql)->fetchAll();
        return $result;
    }

    function get_category_by_id($id){
        global $con;
        $sql="SELECT * FROM `tbl_category` WHERE id=$id";
        $result=$con->query($sql)->fetchAll();
        return $result;
    }
    
    function delete_category($id){
        global $con;
        $sql="DELETE FROM `tbl_category` WHERE id=$id";
        $result=$con->exec($sql);
        return (bool)$result;
    }

    function insert_category($name,$link,$icon){
        global $con;
        $sql="INSERT INTO `tbl_category` (`cat_name`,`link`,`icon`) VAlUES('".$name."','".$link."','".$icon."')";
        $result=$con->exec($sql);
        return (bool)$result;
    }

    function update_category($category,$link,$icon,$id){
        global $con;
        $sql="UPDATE `tbl_category` SET `cat_name`='".$category."',`link`='".$link."',`icon`='".$icon."' WHERE id=$id";
        $result=$con->exec($sql);
        return (bool)$result;
    }

?>