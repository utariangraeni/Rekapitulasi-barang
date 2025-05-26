<?php
include '../../MODEL/USER/User_Model.php';


if (isset($_POST['namaUser']) && isset($_POST['passUser']) && isset($_POST['noUser'])) {
    $namaUser = $_POST['namaUser'];
    $passUser = $_POST['passUser'];
    $noTelp = $_POST['noUser'];

    $result = addUser($namaUser, $passUser, $noTelp);
    if ($result) {
        header("Location: ../../VIEW/USER/USER_VIEW.php");
    } else {
        echo "Gagal menambahkan user.";
    }
}
