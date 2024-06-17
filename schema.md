Database
- user
  - id
  - nama lengkap
  - email
  - nomor telepon
  - password
  - status

- admin
  - id
  - nama lengkap
  - email
  - nomor telepon
  - password 

- driver
  - id
  - nama lengkap
  - email
  - nomor telepon
  - password
  - kendaraan
  - kapasitas
  - status


- transaksi
  - id
  - rute (fk rute)
  - driver (fk driver)
  - tanggal mulai
  - tgl selesai
  - jml penumpang
  - nama pemesan
  - perusahaan
  - telepon
  - alamat penjemputan
  - pemandu wisata
  - tempat makan
  - akomodasi
  - catatan
  - total harga
  - status (dibayar/selesai dll)
  - rating
- rute
  - kota awal 
  - kota tujuan
  - harga
  - waktu

- inbox
  - id
  - id penerima (fk)
  - judul
  - tanggal waktu
  - status (dibaca ga)
  - konten

- pelaporan
  - id
  - pelapor (fk)
  - judul
  - kategori
  - isi
