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
    public static function getShoes($sql)
    {
        global $pdo;
        $shoes = $pdo->query($sql);
        foreach ($shoes->fecthAll(PDO::FETCH_ASSOC)  as $row) {
            $shoes = new Shoes();
            foreach ($row as $key => $sho) {
                $shoes->{$key} = $row[$key];
            }
            $arrShoes[] = $shoes;
        }
        return $arrShoes;
    }
    public static function getById($id)
    {
        global $pdo;
        $sql = "SELECT *  FROM `shoes` WHERE `id` = '$id'";
        $shoes = new Shoes();
        $temp = $pdo->query($sql);
        $row =  $temp->fecth(PDO::FETCH_ASSOC);
        foreach ($row as $key => $sho) {
            $shoes->{$key} = $row[$key];
        }
        return $shoes;
    }
}
