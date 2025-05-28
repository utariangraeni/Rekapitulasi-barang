<?php
include '../../../CONTROL/DATA_SUPPLIER/DATA_SUPPLIER_CONTROL.php';
$showAll = showAll();
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
    /*Spasi di dalam sel */
    border: 1px solid #262525;
    /* Batas sel */
    background-color: #f7f8fa
  }

  th {
    text-align: left;
    /* Posisi horizontal teks header */
    background-color: yellow;

  }
</style>

<body>
  <h2>DATA SUPPLIER</h2>
  <button id="Tambah" role="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Tambah</button>

  <button id="Hapus" role="button">Hapus</button>

  <table>
    <thead>
      <tr>
        <th>NO</th>
        <!-- <th>KODE SUPPLIER</th> -->
        <th>NAMA SUPPLIER</th>
        <th>ALAMAT</th>
        <th>NO TELP</th>
        <th>ACTION</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($showAll as $index => $data): ?>
        <tr>
          <td><?= $index + 1 ?></td>
          <td><?= $data['nama_supplier'] ?></td>
          <td><?= $data['alamat'] ?></td>
          <td><?= $data['no_telp'] ?></td>
          <td><button type="button" data-bs-toggle="modal" data-bs-target="#editDataPelanggan" onclick="openEdit(this)">EDIT</button> | <button type="button">DELETE</button></td>
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
          <form action="../../../CONTROL/DATA_SUPPLIER/DATA_SUPPLIER_CONTROL.php" method="post">
            <!-- <div>
                            <label for="kodePelanggan">Kode Pelanggan</label>
                            <input type="text" name="kodePelanggan" id="kodePelanggan">
                        </div> -->
            <div>
              <label for="namaSupplier">Nama Supplier</label>
              <input type="text" name="namaSupplier" id="namaSupplier">
            </div>
            <div>
              <label for="alamatSupplier">Alamat Supplier</label>
              <input type="text" name="alamatSupplier" id="alamatSupplier">
            </div>
            <div>
              <label for="noTelpSup">No Telp Supplier</label>
              <input type="text" name="noTelpSup" id="noTelpSup">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambah Suuplier</button>
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
          <form action="../../../CONTROL/DATA_SUPPLIER/DATA_SUPPLIER_CONTROL.php" method="post">
            <!-- <div>
                            <label for="kodePelanggan">Kode Pelanggan</label>
                            <input type="text" name="kodePelanggan" id="kodePelanggan">
                        </div> -->
            <div>
              <label for="namaSupplierEdit">Nama Supplier</label>
              <input type="text" name="namaSupplierEdit" id="namaSupplierEdit">
            </div>
            <!-- <div>
              <label for="kodePelanggan">Kode Supplier</label>
              <input type="text" name="kodePelanggan" id="kodePelangganEdit">
            </div> -->
            <div>
              <label for="alamatEdit">Alamat Supplier</label>
              <input type="text" name="alamatEdit" id="alamatEdit">
            </div>
            <div>
              <label for="noTelpEdit">No Telp Supplier</label>
              <input type="text" name="noTelpEdit" id="noTelpEdit">
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


  <script>
    function openEdit(button) {
      const row = button.closest('tr');
      const namaSup = row.cells[1].innerText;
      let alamatSup = row.cells[2].innerText;
      let noSup = row.cells[3].innerText;

      document.getElementById('namaSupplierEdit').value = namaSup;
      document.getElementById('alamatEdit').value = alamatSup;
      document.getElementById('noTelpEdit').value = noSup;


    }
  </script>
</body>

</html>