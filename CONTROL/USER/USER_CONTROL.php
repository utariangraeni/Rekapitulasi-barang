<?php
include '../../MODEL/USER/User_Model.php';


if (isset($_POST['deleteUser']) && !empty($_POST['deleteUser'])) {
    // Delete user action
    $delUser = $_POST['deleteUser'];
    $result = deleteUser($delUser);
    if ($result) {
        header("Location: ../../VIEW/USER/USER_VIEW.php");
        exit();
    } else {
        echo "Gagal menghapus user.";
    }
} elseif (isset($_POST['namaUser']) && isset($_POST['passUser']) && isset($_POST['noUser'])) {
    // Add user action
    $namaUser = $_POST['namaUser'];
    $passUser = $_POST['passUser'];
    $noTelp = $_POST['noUser'];
    $result = addUser($namaUser, $passUser, $noTelp);
    if ($result) {
        header("Location: ../../VIEW/USER/USER_VIEW.php");
        exit();
    } else {
        echo "Gagal menambahkan user.";
    }
} elseif (isset($_POST['editnamaUser']) && isset($_POST['editpassUser']) && isset($_POST['editnoUser'])) {
    // Edit user action
    $editnamaUser = $_POST['editnamaUser'];
    $editPass = $_POST['editpassUser'];
    $editNoTelp = $_POST['editnoUser'];
    $result = editUser($editnamaUser, $editPass, $editNoTelp);
    if ($result) {
        header("Location: ../../VIEW/USER/USER_VIEW.php");
    } else {
        echo "Gagal mengedit user.";
    }
}


