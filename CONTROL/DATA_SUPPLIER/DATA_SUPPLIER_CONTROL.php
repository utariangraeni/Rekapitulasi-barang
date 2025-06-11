<?php
include 'C:/xampp/htdocs/Rekapitulasi-barang/MODEL/DATA_SUPPLIER/DATA_SUPPLIER_MODEL.php';

// Tambah supplier
if (isset($_POST['namaSuplier']) && isset($_POST['alamatSupplier']) && isset($_POST['notelpSupplier'])) {
    $namasupplier = $_POST['namaSupplier'];
    $alamat = $_POST['alamatSupplier'];
    $notelpSupplier = $_POST['notelpSupplier'];
    $result = addSupplier($namasupplier, $alamat, $notelpSupplier);
    print "Berhasil menambahkan supplier";

// Edit supplier
} elseif (isset($_POST['editNamaS']) && isset($_POST['editAlamatS']) && isset($_POST['editNoS']) && isset($_POST['idSupplier'])) {
    $id = $_POST['idSupplier'];
    $namaEdit = $_POST['editNamaS'];
    $alamatEdit = $_POST['editAlamatS'];
    $noEdit = $_POST['editNoS'];
    $result = editSupplier($id, $namaEdit, $alamatEdit, $notelpEdit);
    print "Berhasil Edit Data";

// Hapus Supplier
} elseif (isset($_POST['userDelete'])) {
    $utariDeleteSupplier = $_POST['userDelete'];
    $result = deleteSupplier($utariDeletesSupplier);
    if ($result) {
        print "Berhasil Menghapus Data";
    } else {
        print "Gagal Menghapus Data";
    }

// Jika tidak valid
} else {
    print 'PERMINTAAN TIDAK VALID';
}
