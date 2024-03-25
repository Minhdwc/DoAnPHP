<?php
class Categories
{
    public $id, $name;
    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }
    public static function getCategories(PDO $pdo)
    {
        try {
            $sql = "SELECT * FROM `categories`";
            $stmt = $pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error from catch Shoes SQL" . $e->getMessage();
            return false;
        }
    }
}
