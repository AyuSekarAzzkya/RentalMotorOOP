<?php

class Data {
    public $member;
    public $jenis;
    public $waktu;
    public $diskon;
    protected $pajak;
    private $Scooter, $Sport, $SportTouring, $Cross;
    private $listmember = ['ana', 'sam', 'alex', 'ara'];

    function __construct(){
        $this->pajak = 10000;
    }

    public function getmember(){
        if (in_array($this->member, $this->listmember)){
            return "Member";
        } else {
            return "Non-Member";
        }
    }

    public function getharga() {
        $data["Scooter"] = $this->Scooter;
        $data["Sport"] = $this->Sport;
        $data["SportTouring"] = $this->SportTouring;
        $data["Cross"] = $this->Cross;
        return $data;
    }
}

class Rental extends Data {
    public function hargarental() {
        $dataHarga = $this->getharga()[$this->jenis];
        $diskon = $this->getmember() == "Member" ? 5 : 0;
        if($this->waktu === 1){
           $bayar = ($dataHarga - ($dataHarga * $diskon / 100)) + $this->pajak;
        } else {
            $bayar = (($dataHarga * $this->waktu) - ($dataHarga * $diskon / 100)) + $this->pajak;
        }
        return [$bayar, $diskon];
    }

    public function pembayaran() {
        echo "<center>";
        echo $this->member . " berstatus sebagai " . $this->getmember() . ". Mendapatkan Diskon sebesar " . $this->hargarental()[1] . "%";
        echo "<br>";
        echo "Jenis motor yang di rental adalah " . $this->jenis . " selama " . $this->waktu . " hari";
        echo "<br>";
        echo "Harga rental per-harinya : Rp. " . number_format($this->getharga()[$this->jenis]);
        echo "<br>";
        echo "Besar yang harus dibayarkan adalah Rp." . number_format($this->hargarental()[0]);
        echo "</center>";
    }
}
?>
