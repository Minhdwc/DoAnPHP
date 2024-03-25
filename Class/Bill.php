<?php
class Bill
{
    public $id, $idUSer, $idShoppingCart, $dateBill, $totalBill;
    public function __construct($id, $idUSer, $idShoppingCart, $dateBill, $totalBill)
    {
        $this->id = $id;
        $this->idUSer = $idUSer;
        $this->idShoppingCart = $idShoppingCart;
        $this->dateBill = $dateBill;
        $this->totalBill = $totalBill;
    }
    public static function getBillUser(PDO $pdo, $id)
    {
        try {
            $sql = "SELECT * FROM `bill` WHERE `idUser` = $id";
            $stmt = $pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error from catch Bill SQL" . $e->getMessage();
            return false;
        }
    }
}
