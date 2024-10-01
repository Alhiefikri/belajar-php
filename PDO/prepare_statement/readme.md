# Dokumentasi Proyek Data Mahasiswa

## Deskripsi
Proyek ini menggunakan PHP dengan PDO untuk mengelola data mahasiswa dalam database. Menggunakan prepared statements untuk meningkatkan keamanan dan mencegah SQL injection.

## Penggunaan Prepared Statements
Prepared statements adalah fitur di PDO yang memungkinkan pemisahan antara query SQL dan data. Ini meningkatkan keamanan dan efisiensi, serta melindungi aplikasi dari serangan SQL injection.

### Kelas Data
Kelas `Data` memiliki beberapa metode untuk berinteraksi dengan database.

- **insertData($nama, $alamat)**: 
  - Menambahkan data mahasiswa baru ke dalam tabel `mahasiswa`.
  - Menggunakan prepared statements untuk menghindari SQL injection.
  
- **getLike($nama)**:
  - Mengambil data mahasiswa berdasarkan nama yang mirip (menggunakan LIKE).
  - Menggunakan prepared statements untuk memastikan input aman.
  
- **getIn(array $list)**:
  - Mengambil data mahasiswa yang namanya terdapat dalam daftar (menggunakan IN).
  - Menggunakan prepared statements untuk efisiensi dan keamanan.

## Struktur Proyek
- **Connection.php**: Mengatur koneksi ke database.
- **Data.php**: Berisi kelas `Data` dengan metode untuk manipulasi data.
- **index.php**: Menggunakan kelas `Data` untuk menampilkan dan menambahkan data.

## Cara Menjalankan
1. Pastikan Anda memiliki server PHP dan database yang terkonfigurasi.
2. Sesuaikan informasi koneksi di `Connection.php`.
3. Jalankan `index.php` untuk melihat contoh penggunaan.

## Lisensi
Proyek ini bersifat open-source dan dapat digunakan sesuai dengan ketentuan yang berlaku.
