# sistem-informasi-rumah-sakit
Web sistem informasi rumah sakit menggunakan Laravel 8 dan Bootstrap 5

# Petunjuk Instal
1. Silahkan clone/download file ini
1. Ketik composer install di terminal
2. Rename file .env.example menjadi .env
3. Buka file .env, sesuaikan databasenya
4. Buka terminal, ketikan php artisan key:generate
5. Jalankan migrate, php artisan migrate
6. Jalankan seeder, php artisan db:seed --class=DokterSeeder/PegawaiSeeder/TempatTidurSeeder/PasienSeeder (opsional)
7. Register ke aplikasi

# Petunjuk Database (WAJIB LAKUKAN)
Berikan default NULL pada kolom berikut:
- table data_rawat, kolom tanggal_keluar
- table tempat_tidur, kolom pasien

# Panduan Penggunaan
1. Jika status tempat tidur TERISI, maka nama pasien wajib diisi sama persis
2. Ketika menambahkan data jadwal dokter, no dokter harus sesuai dan tersedia di database
3. Ketika memasukkan data tindakan, nama pasien harus sesuai dan tersedia di database

# Fitur
1. Login dan register sebagai admin
2. Mengelola (CRUD) data dokter, data pasien, data tempat tidur, data pegawai, data obat dan perlengkapan, jadwal praktek dokter, data rawat, dan data tindakan
3. Hanya tersedia 1 role, yaitu Administrator

*Proyek ini open source, silahkan gunakan sesuka anda. Jika mau berdonasi juga boleh :)

https://saweria.co/yrartz
