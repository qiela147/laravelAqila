TEMPLATE CV LARAVEL - CRUD + FOTO PROFIL

Isi ZIP ini adalah file tambahan untuk project Laravel yang sudah ada. Jangan mengganti seluruh project Laravel.

FITUR
- Tambah data CV
- Melihat CV dengan desain dua kolom seperti contoh
- Edit data CV
- Hapus data CV
- Upload dan ganti foto profil
- Cetak atau simpan CV sebagai PDF melalui menu print browser
- Validasi form dan penyimpanan foto pada storage Laravel

LANGKAH PEMASANGAN

1. BACKUP project Laravel terlebih dahulu.

2. Ekstrak ZIP. Salin folder/file dari dalam ZIP ke folder project Laravel dengan mempertahankan struktur folder:
   app/Models/CvProfile.php
   app/Http/Controllers/CvProfileController.php
   database/migrations/2026_10_27_000000_create_cv_profiles_table.php
   resources/views/cv-profiles/
   routes/web-snippet.php.txt

3. Buka routes/web.php. Tambahkan baris berikut di bagian atas bersama use controller lain:
   use App\Http\Controllers\CvProfileController;

   Lalu tambahkan route ini setelah route yang sudah ada:
   Route::resource('cv-profiles', CvProfileController::class);

   PENTING: Jangan mengganti atau menghapus route project yang sudah ada.

4. Pastikan file .env memakai nama database project kamu. Contoh:
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nama_database_kamu
   DB_USERNAME=root
   DB_PASSWORD=

   Sesuaikan nama database, port, username, dan password dengan pengaturan Laragon kamu. Jangan menimpa isi .env dengan contoh mentah.

5. Jalankan terminal pada folder project Laravel:
   php artisan migrate

   Perintah ini membuat tabel cv_profiles. Jika database belum dibuat, buat dulu database kosong dengan nama yang sesuai pada .env melalui phpMyAdmin atau HeidiSQL.

6. Buat symbolic link penyimpanan file upload (cukup sekali):
   php artisan storage:link

7. Jalankan aplikasi:
   php artisan serve

8. Buka alamat berikut pada browser:
   http://127.0.0.1:8000/cv-profiles

CARA PAKAI
- Klik “Tambah CV”.
- Isi nama dan jabatan (wajib), lalu lengkapi kontak, tentang saya, pendidikan, pengalaman, keahlian, referensi.
- Pilih foto JPG/PNG/WEBP maksimal 2 MB.
- Klik “Simpan CV”.
- Di halaman CV, gunakan Edit untuk memperbarui dan Hapus untuk menghapus.
- Klik “Cetak / Simpan PDF” untuk mencetak atau menyimpan PDF. Pada dialog print, pilih Save as PDF.

CATATAN
- Foto disimpan di storage/app/public/cv-photos dan ditampilkan melalui public/storage setelah storage:link dibuat.
- Jangan upload foto lebih dari 2 MB.
- Bila route tidak ditemukan, cek routes/web.php dan jalankan:
  php artisan route:list
- Bila perubahan route belum terbaca, jalankan:
  php artisan optimize:clear
- Kalau php artisan migrate menampilkan error koneksi, periksa .env, pastikan MySQL Laragon hidup, lalu coba lagi.
- Nama tabel yang digunakan adalah cv_profiles.
