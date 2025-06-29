<?php
include "../../../MODEL/DATA_BARANG/DATA_BARANG_MODEL.php";
$showBarang = showAllBarang();
// print_r($showBarang);
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
    </button>
    <h2>DATA BARANG</h2>
    <button id="Tambah" role="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Tambah</button>
    <table>
        <thead>
            <tr>
                <th>NO</th>
                <th>KODE BARANG</th>
                <th>NAMA BARANG</th>
                <th>STOK BARANG</th>
                <th>HARGA</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($showBarang as $index => $data): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= $data['kode_barang'] ?></td>
                    <td><?= $data['nama_barang'] ?></td>
                    <td><?= $data['stok'] ?></td>
                    <td><?= $data['harga'] ?></td>
                    <td><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal" onclick="ambilEditData(this)">EDIT</button> | <button type="button" class="btn btn-danger" onclick="deleteBarang(this)">DELETE</button></td>
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
                    <form action="../../../CONTROL/DATA_BARANG/DATA_BARANG_CONTROL.php" method="post">
                        <div>
                            <label for="kodeBarang">Kode Barang</label>
                            <input type="text" name="kodeBarang" id="kodeBarang">
                        </div>
                        <div>
                            <label for="namaBarang">Nama Barang</label>
                            <input type="text" name="namaBarang" id="namaBarang">
                        </div>
                        <div>
                            <label for="stockBarang">Stock Barang</label>
                            <input type="number" name="stockBarang" id="stockBarang">
                        </div>
                        <div>
                            <label for="hargaBarang">Harga Barang</label>
                            <input type="text" name="hargaBarang" id="hargaBarang">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Understood</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Edit -->
    <div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../../../CONTROL/DATA_BARANG/DATA_BARANG_CONTROL.php" method="post">
                        <div>
                            <label for="editkodeBarang">Kode Barang</label>
                            <input type="text" name="editkodeBarang" id="editkodeBarang">
                        </div>
                        <div>
                            <label for="editnamaBarang">Nama Barang</label>
                            <input type="text" name="editnamaBarang" id="editnamaBarang">
                        </div>
                        <div>
                            <label for="editstockBarang">Stock Barang</label>
                            <input type="number" name="editstockBarang" id="editstockBarang">
                        </div>
                        <div>
                            <label for="edithargaBarang">Harga Barang</label>
                            <input type="text" name="edithargaBarang" id="edithargaBarang">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit Barang</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function ambilEditData(button) {
            const row = button.closest('tr');
            const kodeBarang = row.cells[1].innerText;
            const namaBarang = row.cells[2].innerText;
            const stockBarang = row.cells[3].innerText;
            const hargaBarang = row.cells[3].innerText;

            console.log(kodeBarang);
            console.log(namaBarang);
            console.log(stockBarang);
            console.log(hargaBarang);

            document.getElementById('editkodeBarang').value = kodeBarang;
            document.getElementById('editnamaBarang').value = namaBarang;
            document.getElementById('editstockBarang').value = stockBarang;
            document.getElementById('edithargaBarang').value = hargaBarang;
        }

        function deleteBarang(button) {
            const row = button.closest('tr');
            const dataBarang = row.cells[1].innerText;
            console.log('DI CEK' + dataBarang);

            $.ajax({
                url: '../../../CONTROL/DATA_BARANG/DATA_BARANG_CONTROL.php',
                type: 'POST',
                data: {
                    userDelete : dataBarang,
                },
                success: function(response) {
                    console.log('SUKSES');
                },
                error: function(response) {
                    console.log('CEK LAGI');

                }

            });

        }
    </script>
</body>
</html>
</body>
</html>