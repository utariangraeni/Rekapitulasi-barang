<?php
include '../../MODEL/DATA_BARANG/DATA_BARANG_MODEL.php';

if (isset($_POST['kodeBarang']) && isset($_POST['namaBarang']) && isset($_POST['stockBarang']) && isset($_POST['hargaBarang'])) {
    $kodebarang = $_POST['kodeBarang'];
    $namabarang = $_POST['namaBarang'];
    $stockbarang = $_POST['stockBarang'];
    $hargabarang = $_POST['hargaBarang'];
    $result = addBarang($kodebarang, $namabarang, $stockbarang, $hargabarang);
} else {
    print "PENIPU.";
}
