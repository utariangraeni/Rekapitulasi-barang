<?php
include 'C:/xampp/htdocs/Rekapitulasi-barang/MODEL/DATA_PELANGGAN/DATA_PELANGGAN_MODEL.php';

if (isset($_POST['namaPelanggan']) && isset($_POST['alamat']) && isset($_POST['noTelp'])) {
    $namaPelanggan = $_POST['namaPelanggan'];
    $alamatPelanggan = $_POST['alamat'];
    $noTelpPelanggan = $_POST['noTelp'];
    // $hargabarang = $_POST['hargaBarang'];
    $result = addPelanggan($namaPelanggan, $alamatPelanggan, $noTelpPelanggan);
    // header("Location: ../../VIEW/MASTER/DATA_PELANGGAN/DATA_PELANGGAN_VIEW.php");
} elseif (isset($_POST['namas']) && isset($_POST['alamats']) && isset($_POST['notelps']) && isset($_POST['kodes'])) {
    $namaP = $_POST['namas'];
    $alamatP = $_POST['alamats'];
    $notelepP = $_POST['notelps'];
    $kodes = $_POST['kodes'];
    $result = editPelanggan($namaP, $alamatP, $notelepP, $kodes);
} elseif (isset($_POST['hapusLur'])) {
    $deleteGus = $_POST['hapusLur'];
    $result = deletePelanggan($deleteGus);
} else {
    print "Cek";
}
