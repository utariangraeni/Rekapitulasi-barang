<?php
include 'C:/xampp/htdocs/Rekapitulasi-barang/MODEL/DATA_PELANGGAN/DATA_PELANGGAN_MODEL.php';
// Tambah pelanggan
if (isset($_POST['namaPelanggan']) && isset($_POST['alamatPelanggan']) && isset($_POST['notelpPelanggan'])) {
    $namapelanggan = $_POST['namaPelanggan'];
    $alamat = $_POST['alamatPelanggan'];
    $notelppelanggan = $_POST['notelpPelanggan'];
    $result = addPelanggan($namapelanggan, $alamat, $notelppelanggan);
    print "Berhasil menambahkan pelanggan";

// Edit pelanggan
} elseif (isset($_POST['editnamaPelanggan']) && isset($_POST['editalamatPelanggan']) && isset($_POST['editnotelpPelanggan'])) {
    // $id = $_POST['idPelanggan'];
    $namaEdit = $_POST['editnamaPelanggan'];
    $alamatEdit = $_POST['editalamatPelanggan'];
    $noEdit = $_POST['editnotelpPelanggan'];
    $result = editPelanggan( $namaEdit, $alamatEdit, $noEdit);
    print "Berhasil Edit Data";

// Hapus pelanggan
} elseif (isset($_POST['userDelete'])) {
    $utariDeletePelanggan = $_POST['userDelete'];
    $result = deletePelanggan($utariDeletePelanggan);
    if ($result) {
        print "Berhasil Menghapus Data";
    } else {
        print "Gagal Menghapus Data";
    }

// Jika tidak valid
} else {
    print 'PERMINTAAN TIDAK VALID';
}
