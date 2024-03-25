<?php
class Shoes
{
    public $id, $name, $price, $idSize, $color, $idCate, $idPro, $des, $datePro;
    public function __construct($id = 0, $name = "", $price = 0, $idSize = 0, $color = "", $idCate = 0, $idPro = 0, $des = "", $datePro = "")
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->idSize = $idSize;
        $this->color = $color;
        $this->idCate = $idCate;
        $this->idPro = $idPro;
        $this->des = $des;
        $this->datePro = $datePro;
    }
    public static function getImagesShoes(PDO $pdo, $id)
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
    public static function getShoes(PDO $pdo)
    {
        try {
            $sql = "SELECT * FROM `shoes`";
            $stmt = $pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error from catch Shoes SQL" . $e->getMessage();
            return false;
        }
    }
}
