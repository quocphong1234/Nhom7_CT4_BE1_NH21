<?php
class Manufacture extends Db
{
    public function getAllManu()
    {
        $sql = self::$connection->prepare("SELECT * FROM manufactures");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array   
    }
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
    public function getProductByManuID($manuid)
    {
        $sql = self::$connection->prepare("SELECT PD.* FROM manufactures MF, products PD  WHERE MF.manu_id = ? AND MF.manu_id = PD.manu_id");
        $manuid = "$manuid";
        $sql->bind_param("i", $manuid);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    public function getManuIDAll($manuid, $page, $perPage)
    {
        // Tính số thứ tự trang bắt đầu 
        $firstLink = ($page - 1) * $perPage;
        $sql = self::$connection->prepare("SELECT PD.* FROM manufactures MF, products PD  WHERE MF.manu_id = ? AND MF.manu_id = PD.manu_id LIMIT ?, ?");
        $sql->bind_param("iii", $manuid, $firstLink, $perPage);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function paginate($url, $total, $perPage)
    {
        $totalLinks = ceil($total / $perPage);
        $link = "";
        for ($j = 1; $j <= $totalLinks; $j++) {
            $link = $link . "<li><a href='$url&page=$j'> $j </a></li>";
        }
        return $link;
    }
   
    public function selectName($manuid)
    {
        $sql = self::$connection->prepare("SELECT * FROM `manufactures` WHERE `manu_id`=?");
        $sql->bind_param("i",$manuid);
        $sql->execute(); //return an object
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function updateFile($manu_id,$manu_name)
    {
        $sql = self::$connection->prepare("UPDATE `manufactures` SET `manu_name`=? WHERE `manu_id` = ?");
        $sql->bind_param("si", $manu_name,$manu_id);
        return $sql->execute();
    }
    
   
}