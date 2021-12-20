<?php
class Protype extends Db{
    public function getAllProtypes()
    {
        $sql = self::$connection->prepare("SELECT * FROM protypes");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function addProtype($type_name)
    {
        $sql = self::$connection->prepare("INSERT 
        INTO `protypes`(`type_name`) 
        VALUES (?)");
        $sql->bind_param("s", $type_name);
        return $sql->execute(); //return an object
    }
    
    public function delProtype($type_id)
    {
        $sql = self::$connection->prepare("DELETE FROM `protypes` WHERE `type_id`=?");
        $sql->bind_param("i", $type_id);
        return $sql->execute(); //return an object
    }
    public function getTypeByID($type_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM manufactures 
        WHERE `type_id` = ?");
        $sql->bind_param("i", $type_id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
}