<?php
// Uji jika tombol simpan diklik
// Persiapan simpan data baru
$simpan = mysqli_query($koneksi, "INSERT INTO dbabsensi (nip, nama_lengkap, seksi, no_hp, upload_image, tgl_absen, tgl_kegiatan)
                                  VALUES ('$_POST[tnip]',
                                          '$_POST[tnama]',
                                          '$_POST[tseksi]',
                                          '$_POST[tnohp]',
                                          '$_POST[tupload]',
                                          '$_POST[tabsen]',
                                          '$_POST[tkategori]')");
