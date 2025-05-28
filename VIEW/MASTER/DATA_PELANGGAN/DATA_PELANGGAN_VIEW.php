<?php
include '../../../CONTROL/DATA_PELANGGAN/DATA_PELANGGGAN_CONTROL.php';
$dataPelanggan = showAllPelanggan();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../../ASSET/bootstrap-5.3.3/dist/css/bootstrap.min.css">
    <script src="../../../ASSET/bootstrap-5.3.3/dist/js/bootstrap.min.js"></script>
    <script src="../../../ASSET/jquery-3.7.1.js"></script>
    <script src="../../../ASSET/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="../../../ASSET/sweetalert2/dist/sweetalert2.min.css">
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

    <button id="Hapus" role="button">Hapus</button>


    <table>
        <thead>
            <tr>
                <th>NO</th>
                <th>KODE PELANGGAN</th>
                <th>NAMA PELANGGAN</th>
                <th>ALAMAT</th>
                <th>NO TELP</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dataPelanggan as $index => $data): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= $data['kode_pelanggan'] ?></td>
                    <td><?= $data['nama_pelanggan'] ?></td>
                    <td><?= $data['alamat'] ?></td>
                    <td><?= $data['no_telp'] ?></td>
                    <td> <button id="Edit" role="button" data-bs-toggle="modal" data-bs-target="#editDataPelanggan" onclick="valueEditPelanggan(this)">Edit</button> | <button id="HapusBol" role="button" onclick="hapusDuluBoss(this)">Hapus</button></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../../../CONTROL/DATA_PELANGGAN/DATA_PELANGGGAN_CONTROL.php" method="post">
                        <!-- <div>
                            <label for="kodePelanggan">Kode Pelanggan</label>
                            <input type="text" name="kodePelanggan" id="kodePelanggan">
                        </div> -->
                        <div>
                            <label for="namaPelanggan">Nama Pelanggan</label>
                            <input type="text" name="namaPelanggan" id="namaPelanggan">
                        </div>
                        <div>
                            <label for="alamat">Alamat Pelanggan</label>
                            <input type="text" name="alamat" id="alamat">
                        </div>
                        <div>
                            <label for="noTelp">No Telp Pelanggan</label>
                            <input type="text" name="noTelp" id="noTelp">
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


    <div class="modal fade" id="editDataPelanggan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="editDataPelangganLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editDataPelangganLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="#" method="post">
                        <!-- <div>
                            <label for="kodePelanggan">Kode Pelanggan</label>
                            <input type="text" name="kodePelanggan" id="kodePelanggan">
                        </div> -->
                        <div>
                            <label for="namaPelanggan">Nama Pelanggan</label>
                            <input type="text" name="namaPelanggan" id="namaPelangganEdit">
                        </div>
                        <div>
                            <label for="kodePelanggan">Kode Pelanggan</label>
                            <input type="text" name="kodePelanggan" id="kodePelangganEdit">
                        </div>
                        <div>
                            <label for="alamat">Alamat Pelanggan</label>
                            <input type="text" name="alamat" id="alamatEdit">
                        </div>
                        <div>
                            <label for="noTelp">No Telp Pelanggan</label>
                            <input type="text" name="noTelp" id="noTelpEdit">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="sendToDatabase()">Tambah Pelanggan</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        function valueEditPelanggan(button) {
            const row = button.closest('tr');
            let kodePelanggan = row.cells[1].innerText;
            let namaPelanggan = row.cells[2].innerText;
            let alamat = row.cells[3].innerText;
            let noTelp = row.cells[4].innerText;

            document.getElementById('namaPelangganEdit').value = namaPelanggan;
            document.getElementById('kodePelangganEdit').value = kodePelanggan;
            document.getElementById('alamatEdit').value = alamat;
            document.getElementById('noTelpEdit').value = noTelp;
            document.getElementById('namaPelangganEdit').disabled = true;
        }

        function sendToDatabase() {
            const namaedits = document.getElementById('namaPelangganEdit').value;
            const alamatedits = document.getElementById('alamatEdit').value;
            const notelpedits = document.getElementById('noTelpEdit').value;
            const kodeEdit = document.getElementById('kodePelangganEdit').value;

            $.ajax({
                url: '../../../CONTROL/DATA_PELANGGAN/DATA_PELANGGGAN_CONTROL.php',
                type: 'POST',
                data: {
                    namas: namaedits,
                    alamats: alamatedits,
                    notelps: notelpedits,
                    kodes: kodeEdit,
                },
                success: function(response) {
                    // Code to execute if the request succeeds
                    swal.fire({
                        title: 'Success',
                        text: 'Sukses Edit Data '+ namaedits,
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 1500,
                        willClose: () => {
                            location.reload();
                        }
                    });
                },
                error: function(xhr, status, error) {
                    // Code to execute if the request fails
                    console.error(error);
                }
            });
        }


        function hapusDuluBoss(button) {
            const row = button.closest('tr');
            let idPelanggan = row.cells[1].innerText;

            // console.log(idPelanggans);

            $.ajax({
                url: '../../../CONTROL/DATA_PELANGGAN/DATA_PELANGGGAN_CONTROL.php',
                type: 'POST',
                data: {
                    hapusLur: idPelanggan,
                },
                success: function(response) {
                    // Code to execute if the request succeeds
                    swal.fire({
                        title: 'Success',
                        text: 'Sukses Menghapus Data',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 1500,
                        willClose: () => {
                            location.reload();
                        }
                    });
                    // location.reload();
                },
                error: function(xhr, status, error) {
                    // Code to execute if the request fails
                    console.error(error);
                }
            });



        }
    </script>
</body>

</html>