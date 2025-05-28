<?php
include 'C:/xampp/htdocs/Rekapitulasi-barang/MODEL/dbcon/dbcon.php';

function addPelanggan($namaPelanggan, $alamatPelanggan, $noTelpPelanggan)
{
    $conn = dbcon();
    $tsql = "INSERT INTO KS_PELANGGAN (kode_pelanggan, nama_pelanggan, alamat, no_telp) VALUES (?, ?, ?, ?)"; // SQL Transaction / Query SQL
    $params = array('', $namaPelanggan, $alamatPelanggan, $noTelpPelanggan);
    $stmt = sqlsrv_query($conn, $tsql, $params);
    if ($stmt === false) {
        echo "Gagal menambahkan pelanggan.";
        die(print_r(sqlsrv_errors(), true));
    } else {
        echo "Pelanggan berhasil ditambahkan.";
        // header("Location: C:/xampp/htdocs/Rekapitulasi-barang/VIEW/MASTER/DATA_PELANGGAN/DATA_PELANGGAN_VIEW.php");
    }
}


function showAllPelanggan()
{
    $conn = dbcon();
    $tsql = "SELECT * FROM KS_PELANGGAN";
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



function editPelanggan($namaP, $alamatP, $notelepP, $kodes)
{
    $conn = dbcon();
    $tsql = "UPDATE KS_PELANGGAN SET kode_pelanggan = ?, alamat = ?, no_telp = ? WHERE nama_pelanggan = ?"; // SQL Transaction / Query SQL
    $params = array($kodes, $alamatP, $notelepP, $namaP);
    $stmt = sqlsrv_query($conn, $tsql, $params);
    if ($stmt === false) {
        echo "Gagal menambahkan pelanggan.";
        die(print_r(sqlsrv_errors(), true));
    } else {
        echo "Pelanggan berhasil diedit.";
        // header("Location: C:/xampp/htdocs/Rekapitulasi-barang/VIEW/MASTER/DATA_PELANGGAN/DATA_PELANGGAN_VIEW.php");
    }
}
function deletePelanggan($deleteGus)
{
    $conn = dbcon();
    $tsql = "DELETE KS_PELANGGAN WHERE kode_pelanggan = ?";
    $params = array($deleteGus);
    $stmt = sqlsrv_query($conn, $tsql, $params);
    if ($stmt === false) {
        echo "GAGAL DELETE PELANGGAN";
    } else {
        echo "SUCCESS DELETE PELANGGAN";
    }
    // sqlsrv_close($conn);
}
