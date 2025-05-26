<?php
include '../../CONTROL/USER/USER_CONTROL.php';
$allUser = showAllUser();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../ASSET/bootstrap-5.3.3/dist/css/bootstrap.min.css">
    <script src="../../ASSET/bootstrap-5.3.3/dist/js/bootstrap.min.js"></script>
    <script src="../../ASSET/jquery-3.7.1.js"></script>
</head>
<style>
    table {
        width: 50%;
        border-collapse: collapse;
        border: black 1px solid;
        text-align: center;
        padding: 10px;
        margin: auto;
        margin-top: 10px;
        margin-bottom: 500px;
    }

    thead {
        border: black 1px solid;
    }

    tr,
    th,
    td {
        border: black 1px solid;
    }

</style>

<body>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary tombolPLus utariplus" id="tombolTambah" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Add User
    </button>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../../CONTROL/USER/USER_CONTROL.php" method="post">
                        <div>
                            <label for="namaUser">NAMA</label>
                            <input type="text" name="namaUser" id="namaUser">
                        </div>
                        <div>
                            <label for="passUser">PASSWORD</label>
                            <input type="text" name="passUser" id="passUser">
                        </div>
                        <div>
                            <label for="noUser">Nomer Telp</label>
                            <input type="number" name="noUser" id="noUser" placeholder="example : 0123456789">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="addDatas">Tambah Data</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="#" method="post">
                        <div>
                            <label for="editnamaUser">NAMA</label>
                            <input type="text" name="editnamaUser" id="editnamaUser" disabled>
                        </div>
                        <div>
                            <label for="editpassUser">PASSWORD</label>
                            <input type="text" name="editpassUser" id="editpassUser">
                        </div>
                        <div>
                            <label for="editnoUser">Nomer Telp</label>
                            <input type="number" name="editnoUser" id="editnoUser" placeholder="example : 0123456789">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="editUsers" onclick="editData()">Edit Data</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <table class="" id="">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th style="color: red;">Password</th>
                <th>No.Telp</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($allUser as $index => $user): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= $user['nama'] ?></td>
                    <td><?= $user['pass'] ?></td>
                    <td><?= $user['no_telp'] ?></td>
                    <td><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal" onclick="ambilEditData(this)">EDIT</button> | <button type="button" class="btn btn-danger" onclick="deleteData(this)">DELETE</button></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <script>
        function deleteData(button) {
            const row = button.closest('tr');
            const nama = row.cells[1].innerText;

            console.log('Deleting user:', nama);

            $.ajax({
                url: '../../CONTROL/USER/USER_CONTROL.php',
                type: 'POST',
                data: {
                    deleteUser: nama
                },
                success: function(response) {
                    // Reload the page or update the table
                    console.log('User deleted successfully:', nama);
                    location.reload(); // Reload the page to reflect changes
                },
                error: function(xhr, status, error) {
                    console.error('Error deleting user:', error);
                }
            });
        }

        function ambilEditData(button) {
            const row = button.closest('tr');
            const nama = row.cells[1].innerText;
            const pass = row.cells[2].innerText;
            const noTelp = row.cells[3].innerText;
            document.getElementById('editnamaUser').value = nama;
            document.getElementById('editpassUser').value = pass;
            document.getElementById('editnoUser').value = noTelp;
        }

        function editData() {
            const nama = document.getElementById('editnamaUser').value;
            const pass = document.getElementById('editpassUser').value;
            const noTelp = document.getElementById('editnoUser').value;
            $.ajax({
                url: '../../CONTROL/USER/USER_CONTROL.php',
                type: 'POST',
                data: {
                    editnamaUser: nama,
                    editpassUser: pass,
                    editnoUser: noTelp
                },
                success: function(response) {
                    // Reload the page or update the table
                    console.log('User edited successfully:', nama);
                    location.reload(); // Reload the page to reflect changes
                },
                error: function(xhr, status, error) {
                    console.error('Error editing user:', error);
                }
            });

        }
    </script>
</body>

</html>