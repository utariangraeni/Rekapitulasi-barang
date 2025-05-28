<?php
include 'C:/xampp/htdocs/rekapitulasi-barang/MODEL/dbcon/dbcon.php';
function addSupplier($namasupplier, $alamat, $notelpsupplier)
{
    $conn = dbcon();
    $tsql = " INSERT INTO KS_SUPPLIER (kode_supplier,nama_supplier,alamat,no_telp) VALUES (?, ?, ?, ?)";
    $params = array('', $namasupplier, $alamat, $notelpsupplier);
    $stmt = sqlsrv_query($conn, $tsql, $params);
     if ($stmt === false) {
        die(print_r(sqlsrv_errors(), return: true));
    } else {
        echo "Barang berhasil ditambahkan.";
    }
}


function showAllSupplier() {
    $conn = dbcon();
    $tsql = "SELECT * from KS_SUPPLIER";
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


function editSupplier($namaEdit, $alamatEdit, $noEdit){
$conn = dbcon();
$tsql = 'UPDATE KS_SUPPLIER SET alamat = ?, no_telp = ? WHERE nama_supplier = ?';
$params = array($alamatEdit, $noEdit, $namaEdit);
$stmt = sqlsrv_query($conn, $tsql, $params);
if($stmt == false){
    echo "GAGAL UPDATE";
} else {
    echo "BERHASIL UPDATE";
}


}
// function showAllSupplier(){
//     $conn = dbcon();
//     $tsql = "SELECT * from KS_SUPPLIER";
//     $stmt = sqlsrv_query($conn, $tsql);
//     if ($stmt === false) {
//         die(print_r(sqlsrv_errors(), true));
    
//         }    $data = [];
//     while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
//         $data[] = $row;
//     }
//     return $data;
// }