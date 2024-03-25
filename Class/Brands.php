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
}
