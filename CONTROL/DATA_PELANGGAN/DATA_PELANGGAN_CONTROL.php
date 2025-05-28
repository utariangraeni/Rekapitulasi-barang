<?php
// include 'C:/xampp/htdocs/Rekapitulasi-barang/MODEL/DATA_PELANGGAN/DATA_PELANGGAN_MODEL.php';
include 'C:/xampp/htdocs/Rekapitulasi-barang/MODEL/DATA_PELANGGAN/DATA_PELANGGAN_MODEL.php';
if (isset($_POST['namaPelanggan']) && isset($_POST['alamatPelanggan']) && isset($_POST['notelpPelanggan'])) {
    $namapelanggan = $_POST['namaPelanggan'];
    $alamat = $_POST['alamatPelanggan'];
    $notelppelanggan = $_POST['notelpPelanggan'];
    $result = addPelanggan($namapelanggan, $alamat, $notelppelanggan);
    header("Location: ../../VIEW/MASTER/DATA_PELANGGAN/DATA_PELANGGAN_VIEW.php");
}else{
    print"penipu";

}