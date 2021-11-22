<?php
class Product extends Db{
    public function getAllProducts()
    {
        $sql = self::$connection->prepare("SELECT * 
        FROM products,manufactures,protypes
        WHERE products.manu_id=manufactures.manu_id
        AND products.type_id=protypes.type_id");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
}