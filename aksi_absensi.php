<?php
// Panggil koneksi database
session_start();
include 'koneksi.php';

if (isset($_POST['bsimpan'])) {

  $nip = $_POST['tnip'];
  $nama_lengkap = $_POST['tnama'];
  $seksi = $_POST['tseksi']; // Removed md5() if not intended
  $no_hp = $_POST['tnohp'];
  $tgl_absen = $_POST['tabsen'];
  $tkategori = $_POST['tkategori'];

  // Untuk gambar
  $foto     = $_FILES['tupload']['name'];
  $tmp      = $_FILES['tupload']['tmp_name'];
  $fotobaru = date('dmYHis') . $foto;
  $path     = "images/" . $fotobaru;

  // Move uploaded file and check if it was successful
  if (move_uploaded_file($tmp, $path)) {
    $sql = "SELECT * FROM dbabsensi WHERE nip = '$nip'";
    $tambah = mysqli_query($koneksi, $sql);

    // Check if the query was successful
    if ($tambah && mysqli_num_rows($tambah) > 0) {
      echo "<script>alert('Data Dengan NIP = " . $nip . " sudah ada');</script>";
      echo "<script>window.location.href = 'index.php';</script>";
    } else {
      // Persiapan simpan data baru
      $simpan = mysqli_query($koneksi, "INSERT INTO dbabsensi (nip, nama_lengkap, seksi, no_hp, upload_image, tgl_absen, tgl_kegiatan)
                                        VALUES ('$nip', '$nama_lengkap', '$seksi', '$no_hp', '$fotobaru', '$tgl_absen', '$tkategori')");

      // Jika disimpan sukses
      if ($simpan) {
        echo "<script>
                alert('Simpan data Berhasil');
                document.location='index.php';
              </script>";
      } else {
        echo "<script>
                alert('Simpan data Gagal');
                document.location='index.php';
              </script>";
      }
    }
  } else {
    echo "<script>alert('Upload foto gagal');</script>";
  }
}
