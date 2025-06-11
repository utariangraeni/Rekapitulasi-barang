<?php
include '../../MODEL/USER/User_Model.php';
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
        width: 100%;
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
    th {
    text-align: left;
    background-color: yellow;
    border:black 1px solid;

    }

    td {
        border: black 1px solid;
        background-color: aliceblue;
        text-align: center;
        vertical-align: middle;
    }
    button {
        background-color: blue;
        color: #f7f8fa;
        margin: 10px;
    }

</style>
<body>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary tombolPLus utari" id="tombolTambah" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Add a New User
    </button>

    <!-- Modal -->
      <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
      
                <div class="modal-header">
                 <h5 class="modal-title" id="staticBackdropLabel">Masukkan User</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                  <form action="../../CONTROL/USER/USER_CONTROL.php" method="post">
                  <div class="modal-body">
                     <div class="margin-bottom: 8px;">
                         <label for="namaUser" class="form-label">NAMA</label>
                         <input type="text" class="form-control" name="namaUser" id="namaUser" required>
                     </div>

                <div class="margin-bottom: 8px;">
                    <label for="passUser" class="form-label">PASSWORD</label>
                    <input type="text" class="form-control" name="passUser" id="passUser" required>
                     </div>

                <div class="margin-bottom: 8px;">
                      <label for="noUser" class="form-label">NOMOR TELEPON</label>
                     <input type="number" class="form-control" name="noUser" id="noUser" placeholder="Contoh: 08123456789" required>
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
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">EDIT USER</h5>
                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                        <form action="#" method="post">
                    <div class="modal-body">
                    <div class="margin-bottom: 8px;">
                        <label for="editnamaUser" class="form-label">NAMA</label>
                        <input type="text" class="form-control" name="editnamaUser" id="editnamaUser" disabled>
                    </div>

                     <div class="margin-bottom: 8px;">
                        <label for="editpassUser" class="form-label">PASSWORD</label>
                        <input type="text" class="form-control" name="editpassUser" id="editpassUser">
                     </div>

                    <div class="  margin-bottom: 8px;">
                      <label for="editnoUser" class="form-label">NOMOR TELEPON</label>
                      <input type="text" class="form-control" name="editnoUser" id="editnoUser" placeholder="Contoh: 08123456789" required>
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
    <style>
    table th, table td {
        text-align: center;
        vertical-align: middle;
    }
    table thead {
        background-color: yellow;
    }
</style>
<table class="table table-bordered" id="userTable"></table>
    <table class="" id="">
        <thead></thead>
    <form onsubmit="return false;">
    <label for="search">Cari:</label>
    <input type="search" id="searchInput" placeholder="Cari nama user..." onkeyup="filterTable()">
    <button type="button" onclick="filterTable()">Cari</button>
</form>
</thead>
                <th>NO</th>
                <th>NAMA USER</th>
                <th style=>PASSWORD</th>
                <th>NO TELEPON</th>
                <th>ACTION</th>
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