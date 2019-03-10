<?php
    function get_all_product(){
        global $con;
        $sql="SELECT tbl_category.cat_name,tbl_product.id,tbl_product.name,tbl_product.price,tbl_product.picture FROM `tbl_category` INNER JOIN `tbl_product` ON tbl_product.cat_id=tbl_category.id";
        $result=$con->query($sql)->fetchALL();
        return $result;
    }

    function get_product_by_id($id){
        global $con;
        $sql="SELECT * FROM `tbl_product` WHERE id=$id";
        $result=$con->query($sql)->fetchAll();
        return $result;
    }

    function delete_product($id){
        global $con;
        $sql="DELETE FROM `tbl_product` WHERE id=$id";
        $result=$con->exec($sql);
        return (bool)$result;
    }
    function insert_product($name,$price,$pic,$cat_id){
        global $con;
        $sql="INSERT INTO `tbl_product` (`name`,`price`,`picture`,`cat_id`) VALUES('".$name."',$price,'".$pic."',$cat_id)";
        $result=$con->exec($sql);
        return (bool)$result;
    }
    function update_product($id,$name,$price,$pic,$cat_id){
        global $con;
        $sql="UPDATE `tbl_product` SET `name`='".$name."',`price`=$price,`picture`='".$pic."',`cat_id`=$cat_id WHERE id=$id";
        $result=$con->exec($sql);
        return (bool)$result;
    }

?>