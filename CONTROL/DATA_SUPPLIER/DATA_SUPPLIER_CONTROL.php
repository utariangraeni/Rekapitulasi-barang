<?php
include 'C:/xampp/htdocs/Rekapitulasi-barang/MODEL/DATA_SUPPLIER/DATA_SUPPLIER_MODEL.php';


if (isset($_POST['namaSupplier']) && isset($_POST['alamatSupplier']) && isset($_POST['noTelpSup'])) {
    $namaSup = $_POST['namaSupplier'];
    $alamatSup = $_POST['alamatSupplier'];
    $noSup = $_POST['noTelpSup'];
    $result = addSupplier($namaSup, $alamatSup, $noSup);
    print "Berhasil Menambahkan Supplier";
} elseif (isset($_POST['namaSupplierEdit']) && isset($_POST['alamatEdit']) && isset($_POST['noTelpEdit'])){
    $namaSupE = $_POST['namaSupplierEdit'];
    $alamatSupE = $_POST['alamatEdit'];
    $noSupE = $_POST['noTelpEdit'];
    $result = editSupplier($namaSupE, $alamatSupE, $noSupE);
} else {

    print 'salah';
}
