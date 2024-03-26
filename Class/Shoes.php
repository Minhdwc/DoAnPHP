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
    public static function get4Shoes(PDO $pdo)
    {
        try {
            $sql = "SELECT * FROM `shoes`";
            $stmt = $pdo->query($sql);
            return array_slice($stmt->fetchAll(PDO::FETCH_ASSOC), 0, 4);
        } catch (PDOException $e) {
            echo "Lỗi!!" + $e->getMessage();
            return false;
        }
    }
}
