<?php
class Manufacture extends Db{
    public function getAllManus()
    {
        $sql = self::$connection->prepare("SELECT * FROM manufactures");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function addManufacture($manu_name)
    {
        $sql = self::$connection->prepare("INSERT 
        INTO `manufactures`(`manu_name`) 
        VALUES (?)");
        $sql->bind_param("s", $manu_name);
        return $sql->execute(); //return an object
    }
    public function delManufacture($manu_id)
    {
        $sql = self::$connection->prepare("DELETE FROM `manufactures` WHERE manu_id=?");
        $sql->bind_param("i", $manu_id);
        return $sql->execute(); //return an object
    }
    public function getManuByID($manu_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM manufactures 
        WHERE manu_id = ?");
        $sql->bind_param("i", $manu_id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function editManufacture($manu_id,$manu_name)
    {
        $sql = self::$connection->prepare("UPDATE `manufactures` SET `manu_id`=? WHERE `manu_name` =?");
        $sql->bind_param("i,s", $manu_id,$manu_name);
        return $sql->execute(); //return an object
    }
}