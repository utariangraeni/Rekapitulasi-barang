<?php
include 'C:/xampp/htdocs/Rekapitulasi-barang/MODEL/DATA_SUPPLIER/DATA_SUPPLIER_MODEL.php';
if (isset($_POST['namaSupplier']) && isset($_POST['alamatSupplier']) && isset($_POST['notelpSupplier'])) {
    $namasupplier = $_POST['namaSupplier'];
    $alamat = $_POST['alamatSupplier'];
    $notelpsupplier = $_POST['notelpSupplier'];
    $result = addSupplier($namasupplier, $alamat, $notelpsupplier);
    print "Berhasil menambahkan suplier";

}elseif (isset($_POST['editNamaS'])&& isset($_POST['editAlamatS']) && isset($_POST['editNoS'])) {
    $namaEdit = $_POST['editNamaS'];
    $alamatEdit = $_POST['editAlamatS'];
    $noEdit = $_POST['editNoS'];
    $result = editSupplier($namaEdit, $alamatEdit, $noEdit);

} else{
    print 'GAGAL EDIT';
}