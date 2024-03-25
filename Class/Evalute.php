<?php
class Evalute
{
    public $id, $idShoes, $comment, $star;
    public function __construct($id, $idShoes, $comment, $star)
    {
        $this->id = $id;
        $this->idShoes = $idShoes;
        $this->comment = $comment;
        $this->star = $star;
    }
    public static function getStarShoes(PDO $pdo, $idShoes)
    {
        try {
            $sql = "SELECT * FROM `evalute` WHERE `idShoes` = $idShoes";
            $stmt = $pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error from catch Bill SQL" . $e->getMessage();
            return false;
        }
    }
}
