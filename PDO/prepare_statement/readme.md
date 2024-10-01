# Dokumentasi Proyek Data Mahasiswa

## Deskripsi
Proyek ini menggunakan PHP dengan PDO untuk mengelola data mahasiswa dalam database. Menggunakan prepared statements untuk meningkatkan keamanan dan mencegah SQL injection.

## Penggunaan Prepared Statements
Prepared statements adalah fitur di PDO yang memungkinkan pemisahan antara query SQL dan data. Ini meningkatkan keamanan dan efisiensi, serta melindungi aplikasi dari serangan SQL injection.

### Fitur Utama
- **Insert Data**: Menambahkan data mahasiswa baru ke dalam tabel `mahasiswa`.
- **Pencarian Data**: Mengambil data mahasiswa berdasarkan nama menggunakan pencarian LIKE.
- **Filter Berdasarkan Daftar**: Mengambil data mahasiswa yang namanya terdapat dalam daftar menggunakan IN.

### Struktur Proyek
- **Connection.php**: Mengatur koneksi ke database.
- **index.php**: Menyediakan antarmuka untuk menambahkan dan menampilkan data mahasiswa.

## Cara Menjalankan
1. Pastikan Anda memiliki server PHP dan database yang terkonfigurasi.
2. Sesuaikan informasi koneksi di `Connection.php`.
3. Jalankan `index.php` untuk melihat contoh penggunaan.

## Lisensi
Proyek ini bersifat open-source dan dapat digunakan sesuai dengan ketentuan yang berlaku.
