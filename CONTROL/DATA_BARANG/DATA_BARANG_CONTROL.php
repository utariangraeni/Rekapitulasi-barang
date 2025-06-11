<?php
include '../../MODEL/DATA_BARANG/DATA_BARANG_MODEL.php';

if (isset($_POST['kodeBarang']) && isset($_POST['namaBarang']) && isset($_POST['stockBarang']) && isset($_POST['hargaBarang'])) {
    $kodebarang = $_POST['kodeBarang'];
    $namabarang = $_POST['namaBarang'];
    $stockbarang = $_POST['stockBarang'];
    $hargabarang = $_POST['hargaBarang'];
    $result = addBarang($kodebarang, $namabarang, $stockbarang, $hargabarang);

// Edit Barang
} elseif (isset($_POST['editkodeBarang']) && isset($_POST['editnamaBarang']) && isset($_POST['editstockBarang']) && isset($_POST['edithargaBarang'])) {
    $kodebarangEdit = $_POST['editkodeBarang'];
    $namabarangEdit = $_POST['editnamaBarang'];
    $stockbarangEdit= $_POST['editstockBarang'];
    $hargabarangEdit = $_POST['edithargaBarang'];
    $result = editBarang($kodebarangEdit, $namabarangEdit, $stockbarangEdit, $hargabarangEdit);
    print $result;
    print $kodebarangEdit;
    print $namabarangEdit;
    print $stockbarangEdit;
    print $hargabarangEdit;

// Hapus Barang
} elseif (isset($_POST['userDelete'])) {
    $utariDeleteBarang = $_POST['userDelete'];
    $result = deleteBarang($utariDeleteBarang);
    if ($result) {
        print "Berhasil Menghapus Barang";
    } else {
        print "Gagal Menghapus Barang";
        print $result;
        print $utariDeleteBarang;
    }
// Jika tidak valid
} else {
    print 'PERMINTAAN TIDAK VALID';
}
