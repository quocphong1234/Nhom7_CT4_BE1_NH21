<?php
class Product extends Db
{
    public function getAllProducts()
    {
        $sql = self::$connection->prepare("SELECT * 
        FROM products,manufactures,protypes
        WHERE products.manu_id = manufactures.manu_id
        AND products.type_id = protypes.type_id
        ORDER BY created_at DESC");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function getProductById($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE id = ?");
        $sql->bind_param("i", $id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function addProduct($name,$manu_id,$type_id,$price,$image,$desc,$feature)
    {
        $sql = self::$connection->prepare("INSERT 
        INTO `products`(`name`, `manu_id`, `type_id`, `price`, `image`, `description`,`feature`) 
        VALUES (?,?,?,?,?,?,?)");
        $sql->bind_param("siiissi", $name,$manu_id,$type_id,$price,$image,$desc,$feature);
        return $sql->execute(); //return an object
    }
    public function realated($keyword)
    {
        $sql = self::$connection->prepare("SELECT * FROM `products` WHERE `manu_id` LIKE ? LIMIT 4 ");
        $keyword = "$keyword";
        $sql->bind_param("i", $keyword);
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
            $link = $link . "<li class=`active`><a href='$url&page=$j'> $j </a></li>";
        }
        return $link;
    }

    
    public function delProduct($id)
    {
        $sql = self::$connection->prepare("DELETE FROM `products` WHERE id=?");
        $sql->bind_param("i", $id);
        return $sql->execute(); //return an object
    }
    public function editFile($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `products` WHERE `id`=?");
        $sql->bind_param("i", $id);
        $sql->execute(); //return an object
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function updateFile($name, $manu_id, $type_id, $price, $image, $desc, $feature, $sale, $id)
    {
        $sql = self::$connection->prepare("UPDATE `products` SET `name`= ?,`manu_id`= ?,`type_id`= ?,`price`= ?,`image`= ?,`description`= ?,`feature`= ?,`sale`= ? WHERE `id` = ?");
        $sql->bind_param("siiissiii", $name, $manu_id, $type_id, $price, $image, $desc, $feature, $sale, $id);
        return $sql->execute();
    }
    public function updateFileNoImage($name, $manu_id, $type_id, $price, $desc, $feature, $sale, $id)
    {
        $sql = self::$connection->prepare("UPDATE `products` SET `name`= ?,`manu_id`= ?,`type_id`= ?,`price`= ?,`description`= ?,`feature`= ?,`sale`= ? WHERE `id` = ?");
        $sql->bind_param("siiisiii", $name, $manu_id, $type_id, $price, $desc, $feature, $sale, $id);
        return $sql->execute();
    }
   
}