<?php
include 'C:/xampp/htdocs/Rekapitulasi-barang/MODEL/dbcon/dbcon.php';



function showAll (){
    $conn = dbcon();
    $tsql = "SELECT * FROM KS_SUPPLIER";
    $stmt = sqlsrv_query($conn, $tsql);
    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }
    $data = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $data[] = $row;
    }
    return $data;

}

function addSupplier($namaSup, $alamatSup, $noSup){
$conn = dbcon();
$tsql = 'INSERT INTO KS_SUPPLIER (kode_supplier, nama_supplier, alamat, no_telp) VALUES (?, ?, ?, ?)';
$params = array('', $namaSup, $alamatSup, $noSup);
$stmt = sqlsrv_query($conn, $tsql,$params);
if($stmt === false){
    echo "GAGAL LUR";                                               

} else {

    print "SUCCESS LUR";
}

}

function editSupplier($namaSupE, $alamatSupE, $noSupE){
$conn = dbcon();
$tsql = 'UPDATE KS_SUPPLIER SET alamat = ?, no_telp = ? WHERE nama_supplier = ?';
$params = array($alamatSupE, $noSupE, $namaSupE);
$stmt = sqlsrv_query($conn, $tsql,$params);
if($stmt === false){
    echo "GAGAL LUR";                                               
} else {
    print "SUCCESS LUR";
}
}