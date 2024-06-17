<?php 
$transaksi = [
  'nama' => $_GET['nama'],
  'perusahaan' => $_GET['perusahaan'],
  'telepon' => $_GET['telepon'],
  'alamat_penjemputan' => $_GET['alamat-penjemputan'],
  'pemandu_wisata' => $_GET['pemandu-wisata'] ?? '',
  'tempat_makan' => $_GET['tempat-makan'] ?? '',
  'akomodasi' => $_GET['akomodasi'] ?? '',
  'catatan' => $_GET['catatan'] ?? '',
  'total_harga' => $_GET['total_harga'],
];
