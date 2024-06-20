<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Motor</title>
   
</head>
<body>
    <center>
        <h1>Rental Motor</h1>
    </center>
    <div class="container">
        <div class="form-input">
            <h2>Pendaftaran Rental</h2>
            <form action="" method="post">
                <label for="nama">Nama Pelanggan</label>
                <input type="text" name="nama" id="nama">
                <br>
    
                <label for="durasi">Lama rental (per hari)</label>
                <input type="number" name="durasi" id="durasi">
                <br>
                
                <label for="jenis">Jenis Motor</label>
                <br>
                <select name="jenis" id="jenis">
                    <option value="Scooter">Scooter</option>
                    <option value="Matic">Matic</option>
                    <option value="Bebek">Bebek</option>
                    <option value="Trail">Trail</option>
                </select>
                <br>
    
                <input type="submit" name="submit">
            </form>
        </div>
        
        <div class="php-main">
            <center>
                <h2>Hasil Pembayaran Rental:</h2>
            </center>
            <?php
            
                class RentalMotor {
                    protected $durasi, $ppn = 10000, $harga, $diskon = 0.5, $nama;
                    protected $Scooter = 70000;
                    protected $Matic = 60000;
                    protected $Bebek = 50000;
                    protected $Trail = 40000;
                    protected $namaMember = [  
                        "Budi", "Udin", "Siti"
                    ];
                    
                    public function setCetakMember($harga, $durasi, $diskon){
                        $total = $harga * $durasi + $this->ppn;
                        $totalDiskon = $total * $diskon;
                        $totalBayar = $total - $totalDiskon;
                        echo "<p class='hasil'>Jenis motor yang dirental adalah " . "<b>" . $_POST['jenis'] . " </b>selama <b>" . $_POST['durasi'] . " hari. </b></p>" . "<br>";
                        echo "<p class='hasil'>Harga rental per-harinya: <b> Rp. " . number_format($harga, 2, ',', '.') . "</b></p>" . "<br>";
                        echo "<p class='hasil'>Dengan Pajak:" . "<b> Rp. " . number_format($this->ppn, 2, ',', '.') . "</b></p>" . "<br>";
                        echo "<p class='hasil'>Diskon member:" . "<b> Rp. " . number_format($totalDiskon, 2, ',', '.') . "</b>" . "</p><br>";
                        echo "<p class='hasil'>Total yang harus dibayar: " . "<b> Rp. " . number_format($totalBayar, 2, ',', '.') . "</b></p>" . "<br>";
                    }   

                    public function setCetak($harga, $durasi){
                        $total = $harga * $durasi + $this->ppn;
                        echo "<p class='hasil'>Jenis motor yang dirental adalah " . "<b>" . $_POST['jenis'] . " </b>selama <b>" . $_POST['durasi'] . " hari. </b></p>" . "<br>";
                        echo "<p class='hasil'>Harga rental per-harinya: <b> Rp. " . number_format($harga, 2, ',', '.') . "</b></p>" . "<br>";
                        echo "<p class='hasil'>Dengan Pajak:" . "<b> Rp. " . number_format($this->ppn, 2, ',', '.') . "</b></p>" . "<br>";
                        echo "<p class='hasil'>Total yang harus dibayar: " . "<b> Rp. " . number_format($total, 2, ',', '.') . "</b></p>" . "<br>";
                    }   
                    
                    
                    public function getCetak(){
                        if(isset($_POST['submit'])) {
                            $nama = $_POST['nama'];
                            $durasi = $_POST['durasi'];
                            $jenisMotor = $_POST['jenis'];
                            
                            if((empty($nama)) || (empty($durasi)) || (empty($jenisMotor))) {
                                echo "<center><b class='hasil' style='color:red'>Masukan nilai data dengan lengkap!</b></center>";
                            } else {
                                $hasil = new RentalMotor();
                                
                                if($jenisMotor == 'Scooter'){
                                    $harga = $hasil->Scooter;
                                } else if ($jenisMotor == 'Matic'){
                                    $harga = $hasil->Matic;
                                } else if ($jenisMotor == 'Bebek'){
                                    $harga = $hasil->Bebek;
                                } else if ($jenisMotor == 'Trail'){
                                    $harga = $hasil->Trail;
                                } 
                                
                                if(in_array($nama, $hasil->namaMember)){
                                    $diskon = 0.05;
                                    echo "<p class='hasil2'>Selamat, <b>$nama!</b> Anda mendapatkan diskon <b>Member sebesar 5%.</b></p><br>";
                                    $hasil->setCetakMember($harga, $durasi, $diskon);
                                } else {
                                    $hasil->setCetak($harga, $durasi);
                                }
                                
                            }     
                        }
                    }
                }
                
                $hitung = new RentalMotor();
                $hitung->getCetak();
            ?>
        </div>
    </div>
   
</body>
</html>