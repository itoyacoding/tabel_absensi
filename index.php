<?php
// Panggil Koneksi Database
include "koneksi.php";
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mencoba CRUD</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="mt-3">
      <h3 class="text-center">Tabel Absensi</h3>
      <h3 class="text-center">Database</h3>
    </div>

    <div class="card">
      <div class="card-header bg-primary text-white">
        Data Absensi
      </div>

      <div class="card-body">

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
          Tambah Data
        </button>

        <table class="table table-bordered table-striped table-hover">
          <tr>
            <th>No.</th>
            <th>NIP</th>
            <th>Nama Lengkap</th>
            <th>Seksi</th>
            <th>No. HP</th>
            <th>Image</th>
            <th>Tanggal Absen</th>
            <th>Tanggal Kegiatan</th>
            <th>Aksi</th>
          </tr>

          <?php
          // Persiapan menampilkan data
          $no = 1;
          $tampil = mysqli_query($koneksi, "SELECT * FROM tabel_absensi ORDER BY id_absensi DESC");
          while ($data = mysqli_fetch_array($tampil)) :
          ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $data['nip'] ?></td>
              <td><?= $data['nama_lengkap'] ?></td>
              <td><?= $data['seksi'] ?></td>
              <td><?= $data['no_hp'] ?></td>
              <td>
                <img src="<?= 'image/' . $data['upload_image'] ?>" alt="" height="100">
              </td>
              <td><?= $data['tgl_absen'] ?></td>
              <td><?= $data['tgl_kategori'] ?></td>
              <td>
                <a href="#" class="btn btn-warning">Ubah</a>
                <a href="#" class="btn btn-danger">Hapus</a>
              </td>
            </tr>
          <?php endwhile; ?>
        </table>

        <!-- Awal Modal -->
        <div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Data Absensi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <form method="POST" action="aksi_absensi.php" enctype="multipart/form-data"> <!-- Added enctype for file upload -->
                <div class="modal-body">

                  <div class="mb-3">
                    <label class="form-label">NIP</label>
                    <input type="number" class="form-control" name="tnip" placeholder="Masukkan NIP Anda!" required>
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" name="tnama" placeholder="Masukkan Nama Lengkap Anda!" required>
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Seksi</label>
                    <select class="form-select" name="tseksi" required>
                      <option value="">-- Pilih Seksi --</option>
                      <option value="Instalasi">Instalasi</option>
                      <option value="Unit Kerja">Unit Kerja</option>
                    </select>
                  </div>

                  <div class="mb-3">
                    <label class="form-label">No Handphone</label>
                    <input type="number" class="form-control" name="tnohp" placeholder="Masukkan Nomor Handphone Anda!" required>
                  </div>

                  <div class="mb-3">
                    <label class="foto">Upload Foto</label>
                    <input type="file" name="tupload" accept="images/*" required>
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Tanggal Absen</label>
                    <input type="date" class="form-control" name="tabsen" required>
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Tanggal Kegiatan</label>
                    <input type="date" class="form-control" name="tkategori" required>
                  </div>

                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary" name="bsimpan">Simpan</button>
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- Akhir Modal -->

      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>
