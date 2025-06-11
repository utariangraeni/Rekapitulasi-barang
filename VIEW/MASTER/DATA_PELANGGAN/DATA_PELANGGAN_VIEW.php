<?php
include "../../../MODEL/DATA_PELANGGAN/DATA_PELANGGAN_MODEL.php";
$showPelanggan = showAllPelanggan();
// print_r($showPelanggan);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <script src="../../../ASSET/jquery-3.7.1.js"></script>
    <link rel="stylesheet" href="../../../ASSET/bootstrap-5.3.3/dist/css/bootstrap.min.css">
    <script src="../../../ASSET/bootstrap-5.3.3/dist/js/bootstrap.min.js"></script>
</head>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
        /* Menghilangkan jarak antara batas sel */
    }

    th,
    td {
        padding: 8px;
        /* Spasi di dalam sel */
        border: 1px solid #262525;
        /* Batas sel */
        background-color: #f7f8fa
    }

    th {
        text-align: left;
        /* Posisi horizontal teks header */
        background-color: yellow;

    }

    button {
        background-color: blue;
        color: #f7f8fa;
        margin: 10px;
    }
</style>

<body>
    <h2>DATA PELANGGAN</h2>
    <button id="Tambah" role="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Tambah</button>
    <table>
        <thead>
            <tr>
                <th>NO</th>
                <th>NAMA PELANGGAN</th>
                <th>ALAMAT</th>
                <th>NO Telp</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($showPelanggan as $index => $data): ?>
            <tr>
                <td><?= $index + 1 ?></td>
                <td><?= $data['nama_pelanggan'] ?></td>
                <td><?= $data['alamat'] ?></td>
                <td><?= $data['no_telp'] ?></td>
                <td><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#EditModal" onclick="ambilEditData(this)">EDIT</button> | <button type="button" class="btn btn-danger" onclick="deleteData(this)">DELETE</button></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


    <!-- Modal Tambah -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../../../CONTROL/DATA_PELANGGAN/DATA_PELANGGAN_CONTROL.php" method="post">
                        <div>
                            <label for="namaPelanggan">Nama Pelanggan</label>
                            <input type="text" name="namaPelanggan" id="namaPelanggan">
                        </div>
                        <div>
                            <label for="alamatPelanggan">Alamat</label>
                            <input type="text" name="alamatPelanggan" id="alamatPelanggan">
                        </div>
                        <div>
                            <label for="notelpPelanggan">No Telp</label>
                            <input type="text" name="notelpPelanggan" id="notelpPelanggan">
                        </div>
                            
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah Pelanggan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Edit -->
    <div class="modal fade" id="EditModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="EditModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="EditModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../../../CONTROL/DATA_PELANGGAN/DATA_PELANGGAN_CONTROL.php" method="post">
                        <div>
                            <label for="editnamaPelanggan"> Nama Pelanggan</label>
                            <input type="text" name="editnamaPelanggan" id="editnamaPelanggan">
                        </div>
                        <div>
                            <label for="editalamatPelanggan">Alamat Pelanggan</label>
                            <input type="text" name="editalamatPelanggan" id="editalamatPelanggan">
                        </div>
                        <div>
                            <label for="editnotelpPelanggan"> No Telp</label>
                            <input type="number" name="editnotelpPelanggan" id="editnotelpPelanggan">
                            
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Understood</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
    function ambilEditData(button) {
      const row = button.closest('tr');
      let dataPelanggan = row.cells['1'].innerText;
      let alamatPelanggan = row.cells['2'].innerText;
      let notelpPelanggan = row.cells['3'].innerText;
// console.log(dataPelanggan);
// console.log(alamatPelanggan);
// console.log(notelpPelanggan);


      document.getElementById('editnamaPelanggan').value = dataPelanggan;
      document.getElementById('editalamatPelanggan').value = alamatPelanggan;
      document.getElementById('editnotelpPelanggan').value = notelpPelanggan;
    //   document.getElementById('editnamaPelanggan').disabled = true;
    }

    function deleteData(button) {
      const row = button.closest('tr');
      const dataPelanggan = row.cells[1].innerText;
      console.log('DI CEK' + dataPelanggan);

      $.ajax({
        url: '../../../CONTROL/DATA_PELANGGAN/DATA_PELANGGAN_CONTROL.php',
        type: 'POST',
        data: {
          userDelete :dataPelanggan,
        },
        success: function(response) {
          console.log("SUKSES LUR");
        },
        error: function(response) {
          console.log("COBA DI CEK LAGI");
          
        }

      });

    }
  </script>
</body>
</html>
</body>
</html>