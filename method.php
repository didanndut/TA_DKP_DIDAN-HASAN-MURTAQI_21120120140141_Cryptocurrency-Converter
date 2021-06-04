<?php
function rupiah($angka)
{
    $jumlah_uang = "Rp " . number_format($angka,2, ',', '.');
    return $jumlah_uang;
}
function dollar($angka)
{
    $jumlah_uang = "USD " . number_format($angka,2, ',', '.');
    return $jumlah_uang;
}
 class konversi {
    private $bitcoin;
    private $rupiah = 555270000;
    private $dollar = 37273;
    
    //construct (setter)
    public function __construct ($bitcoin){
        $this->bitcoin = $bitcoin;
    }
    //getter
    public function getbitcoin() {
        return (int)$this->bitcoin * (int)$this->rupiah;
    }
    public function getbitcoin1() {
        return (int)$this->bitcoin * (int)$this->dollar;
    }
 }
?>