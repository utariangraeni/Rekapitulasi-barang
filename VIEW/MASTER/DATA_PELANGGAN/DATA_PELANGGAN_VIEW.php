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
    <button id="Edit" role="button">Edit</button>
    <button id="Hapus" role="button">Hapus</button>
    <table>
        <thead>
            <tr>
                <th>NO</th>
                <th>NAMA PELANGGAN</th>
                <th>ALAMAT</th>
                <th>NO Telp</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($showPelanggan as $index => $data): ?>
            <tr>
                <td><?= $index + 1 ?></td>
                <td><?= $data['nama_pelanggan'] ?></td>
                <td><?= $data['alamat'] ?></td>
                <td><?= $data['no_telp'] ?></td>
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
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="#" method="post">
                        <div>
                            <label for="namaPelanggan"> Nama Pelanggan</label>
                            <input type="text" name="namaPelanggan" id="namaPelanggan">
                        </div>
                        <div>
                            <label for="alamatPelanggan">Alamat Pelanggan</label>
                            <input type="text" name="alamatPelanggan" id="alamatPelanggan">
                        </div>
                        <div>
                            <label for="notelpPelanggan"> No Telp</label>
                            <input type="number" name="notelpPelanggan" id="notelPelanggan">
                            
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Understood</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>