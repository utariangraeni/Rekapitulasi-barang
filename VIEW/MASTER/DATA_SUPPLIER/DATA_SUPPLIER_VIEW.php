<?php
include "../../../MODEL/DATA_SUPPLIER/DATA_SUPPLIER_MODEL.php";
$showSupplier = showAllSupplier();
// print_r($showSupplier);
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
  <h2>DATA SUPPLIER</h2>
  <button id="Tambah" role="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Tambah</button>
  <table>
    <thead>
      <tr>
        <th>NO</th>
        <th>NAMA SUPPLIER</th>
        <th>ALAMAT</th>
        <th>NO TELEPON</th>
        <th>ACTION</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($showSupplier as $index => $data): ?>
        <tr>
          <td><?= $index + 1 ?></td>
          <td><?= $data['nama_supplier'] ?></td>
          <td><?= $data['alamat'] ?></td>
          <td><?= $data['no_telp'] ?></td>
          <td><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal" onclick="ambilEditData(this)">EDIT</button> | <button type="button" class="btn btn-danger" onclick="deleteData(this)">DELETE</button></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <input type="text" name="" id="cek" oninput="ambilDataInput()">

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
          <form action="../../../CONTROL/DATA_SUPPLIER/DATA_SUPPLIER_CONTROL.php" method="post">
            <div>
              <label for="namaSupplier">Nama Supplier</label>
              <input type="text" name="namaSupplier" id="namaSupplier">
            </div>
            <div>
              <label for="alamatSupplier">Alamat</label>
              <input type="text" name="alamatSupplier" id="alamatSupplier">
            </div>
            <div>
              <label for="notelpSupplier">No Telp</label>
              <input type="text" name="notelpSupplier" id="notelpSupplier">
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambah Supplier</button>
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
          <h1 class="modal-title fs-5" id="editModalLabel">Masukkan Supplier</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="../../../CONTROL/DATA_SUPPLIER/DATA_SUPPLIER_CONTROL.php" method="post">
            <div>
              <label for="editNamaS">Nama Supplier</label>
              <input type="text" name="editNamaS" id="editNamaS">
            </div>
            <div>
              <label for="editAlamatS">Alamat</label>
              <input type="text" name="editAlamatS" id="editAlamatS">
            </div>
            <div>
              <label for="editNoS">No Telpon</label>
              <input type="text" name="editNoS" id="editNoS">
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

  <script>
    function ambilEditData(button) {
      const row = button.closest('tr');
      const dataSupplier = row.cells['1'].innerText;
      let alamatSupplier = row.cells['2'].innerText;
      let noSupplier = row.cells['3'].innerText;


      document.getElementById('editNamaS').value = dataSupplier;
      document.getElementById('editAlamatS').value = alamatSupplier;
      document.getElementById('editNoS').value = noSupplier;
      // document.getElementById('editNamaS').disabled = true;
    }

    function deleteData(button) {
      const row = button.closest('tr');
      const dataSupplier = row.cells['1'].innerText;
      console.log('DI CEK' + dataSupplier);

      $.ajax({
        url: '../../../CONTROL/DATA_SUPPLIER/DATA_SUPPLIER_CONTROL.php',
        type: 'POST',
        data: {
          userDelete :dataSupplier,
        },
        success: function(response) {
          console.log("SUKSES LUR");
          alert('REFRESH HALAMAN?');
          location.reload();
        },
        error: function(response) {
          console.log("COBA DI CEK LAGI KODE NYA :)");
          
        }

      });

    }
  </script>

</body>

</html>