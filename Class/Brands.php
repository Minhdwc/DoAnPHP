<?php
class Brand
{

    public $id, $name;
    public function __construct($id = 0, $name = "")
    {
        $this->id = $id;
        $this->name = $name;
    }
    public static function getBrand(PDO $pdo)
    {
        try {
            $sql = "SELECT * FROM `brands`";
            $stmt = $pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error from catch brands SQL" . $e->getMessage();
            return false;
        }
    }
    public static function get4SBrands(PDO $pdo)
    {
        try {
            $sql = "SELECT * FROM `brands`";
            $stmt = $pdo->query($sql);
            return array_slice($stmt->fetchAll(PDO::FETCH_ASSOC), 0, 4);
        } catch (PDOException $e) {
            echo "Lỗi!!" + $e->getMessage();
            return false;
        }
    }
}
