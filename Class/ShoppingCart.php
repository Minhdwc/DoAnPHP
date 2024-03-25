<?php
class ShoppingCart
{
    public $id, $idUser, $idPro, $quantity, $total, $idSize;
    public function __construct($id, $idUser, $idPro, $quantity, $total, $idSize)
    {
        $this->id = $id;
        $this->idUser = $idUser;
        $this->idPro = $idPro;
        $this->quantity = $quantity;
        $this->total = $total;
        $this->idSize = $idSize;
    }
    public static function getShoppingCart(PDO $pdo, $id)
    {
        try {
            $sql = "SELECT * FROM `imageshoes` WHERE `id` = $id";
            $stmt = $pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error from catch Shoes SQL" . $e->getMessage();
            return false;
        }
    }
}
