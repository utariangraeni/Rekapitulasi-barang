<?php
include 'C:/xampp/htdocs/rekapitulasi-barang/MODEL/dbcon/dbcon.php';
function addPelanggan($namapelanggan, $alamat, $notelppelanggan)
{
    $conn = dbcon();
    $tsql = " INSERT INTO KS_PELANGGAN (kode_pelanggan,nama_pelanggan,alamat,no_telp) VALUES (?, ?, ?, ?)";
    $params = array('', $namapelanggan, $alamat, $notelppelanggan);
    $stmt = sqlsrv_query($conn, $tsql, $params);
     if ($stmt === false) {
        die(print_r(sqlsrv_errors(), return: true));
    } else {
        echo "Barang berhasil ditambahkan.";
    }
}

function showAllPelanggan(){
    $conn = dbcon();
    $tsql = "SELECT * from KS_PELANGGAN";
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