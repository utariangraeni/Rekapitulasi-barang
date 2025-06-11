<?php
include 'C:/xampp/htdocs/Rekapitulasi-barang/MODEL/dbcon/dbcon.php';

function addBarang($kodebarang, $namabarang, $stockbarang, $hargabarang)
{
    $conn = dbcon();
    $tsql = " INSERT INTO KS_BARANG (kode_barang, nama_barang, stok, harga) VALUES (?, ?, ?, ?)";
    $params = array($kodebarang, $namabarang, $stockbarang, $hargabarang);
    $stmt = sqlsrv_query($conn, $tsql, $params);
    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        echo "Barang berhasil ditambahkan.";
    }
}

function showAllBarang(){
    $conn = dbcon();
    $tsql = "SELECT * from KS_BARANG";
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

function editBarang($kodebarangEdit, $namabarangEdit, $stockbarangEdit, $hargabarangEdit)
{
    $conn = dbcon();
    $tsql = 'UPDATE KS_BARANG SET kode_barang = ?, stok = ?, harga = ? WHERE nama_barang = ?';
    $params = array($kodebarangEdit, $stockbarangEdit, $hargabarangEdit, $namabarangEdit);
    $stmt = sqlsrv_query($conn, $tsql, $params);
    if ($stmt == false) {
        echo "GAGAL UPDATE";
    } else {
        echo "BERHASIL UPDATE";
    }
}
function deleteBarang($utariDeleteBarang)
{
    $conn = dbcon();
    $tsql = "DELETE KS_BARANG WHERE kode_barang = ?";
    $params = [$utariDeleteBarang];
    $stmt = sqlsrv_query($conn, $tsql, $params);
    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }
    return true;
}