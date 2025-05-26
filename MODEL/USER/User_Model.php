<?php
include '../../MODEL/dbcon/dbcon.php';


function showAllUser()
{
    $conn = dbcon();
    $tsql = "SELECT * FROM KS_USER";
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


function addUser($namaUser, $passUser, $noTelp)
{
    $conn = dbcon();
    $tsql = "INSERT INTO KS_USER (nama, pass, no_telp) VALUES (?, ?, ?)";
    $params = array($namaUser, $passUser, $noTelp);
    $stmt = sqlsrv_query($conn, $tsql, $params);
    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }
    return true;
}


function deleteUser($delUser)
{
    $conn = dbcon();
    $tsql = "DELETE KS_USER WHERE nama = ?";
    $params = [$delUser];
    $stmt = sqlsrv_query($conn, $tsql, $params);
    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }
    return true;
}

function editUser($editnamaUser, $editPass, $editNoTelp)
{
    $conn = dbcon();
    $tsql = "UPDATE KS_USER SET pass = ?, no_telp = ? WHERE nama = ?";
    $params = array($editPass, $editNoTelp, $editnamaUser);
    $stmt = sqlsrv_query($conn, $tsql, $params);
    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }
    sqlsrv_free_stmt($stmt);
    return ['success' => true, 'message' => 'User  successfully updated'];
}
