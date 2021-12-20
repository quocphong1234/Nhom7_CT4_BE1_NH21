<?php
class Product extends Db{
    public function getAllProducts()
    {
        $sql = self::$connection->prepare("SELECT * 
        FROM `products`,`manufactures`,`protypes`
        WHERE `products`.`manu_id`=`manufactures`.`manu_id`
        AND `products`.`type_id`=`protypes`.`type_id`
        ORDER BY `id` DESC");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function addProduct($name,$manu_id,$type_id,$price,$image,$desc)
    {
        $sql = self::$connection->prepare("INSERT 
        INTO `products`(`name`, `manu_id`, `type_id`, `price`, `image`, `description`) 
        VALUES (?,?,?,?,?,?)");
        $sql->bind_param("siiiss", $name,$manu_id,$type_id,$price,$image,$desc);
        return $sql->execute(); //return an object
    }
    public function delProduct($id)
    {
        $sql = self::$connection->prepare("DELETE FROM `products` WHERE id=?");
        $sql->bind_param("i", $id);
        return $sql->execute(); //return an object
    }
    public function getProductsByManu($manu_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE manu_id = ?");
        $sql->bind_param("i", $manu_id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
  
    public function editProduct( $name, $manu_id, $type_id, $price, $image, $desc)
    {
        if ($image == null) {
            $sql = self::$connection->prepare("UPDATE `products` SET 
            `NAME`=?,`MANU_ID`=?,`TYPE_ID`=?,`PRICE`=?,
            `DESCRIPTION`=? 
            WHERE `ID` = ?");
            $sql->bind_param("siiis", $name, $manu_id, $type_id, $price, $desc);
        }else{
            $sql = self::$connection->prepare("UPDATE `products` SET 
            `NAME`=?,`MANU_ID`=?,`TYPE_ID`=?,`PRICE`=?, `IMAGE`=?,
            `DESCRIPTION`=?
            WHERE `ID` = ?");
            $sql->bind_param("siiiss", $name, $manu_id, $type_id, $price, $image, $desc,);
        }       
        return $sql->execute(); //return
    }
    public function getProductsByID($id)
    {
        $sql = self::$connection->prepare("SELECT * 
        FROM products
        Where products.id = ?");
        $sql->bind_param("i", $id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

}