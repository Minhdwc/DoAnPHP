<?php
class Brand
{

    public $id, $name;
    public function __construct($id = 0, $name = "")
    {
        $this->id = $id;
        $this->name = $name;
    }
    public static function getBrand($sql)
    {
        global $pdo;
        $brand = $pdo->query($sql);
        foreach ($brand::fecthAll(PDO::FETCH_ASSOC) as $row) {
            $brand = new Brand();
            foreach ($row as $key => $bra) {
                $brand->{$key} = $row[$key];
            }
            $arrBrand[] = $brand;
        }
        return $arrBrand;
    }
}
