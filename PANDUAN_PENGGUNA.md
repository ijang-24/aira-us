# 📖 Panduan Pengguna - Portal Berita Aira

Selamat datang di Portal Berita Aira! Panduan ini dibuat untuk membantu Anda menjalankan dan mengelola aplikasi ini dengan mudah, bahkan jika Anda bukan seorang programmer.

---

## 🚀 1. Cara Menjalankan Aplikasi

Jika Anda baru pertama kali mengunduh folder aplikasi ini, ikuti langkah-langkah berikut:

1.  **Buka Terminal atau Command Prompt** di dalam folder aplikasi ini.
2.  **Ketik perintah berikut** secara berurutan:
    ```bash
    composer install
    npm install
    cp .env.example .env
    php artisan key:generate
    php artisan migrate --seed
    ```
3.  **Jalankan Aplikasi** dengan mengetik:
    ```bash
    composer dev
    ```
4.  Aplikasi sekarang sudah berjalan! Silakan buka browser Anda dan akses:
    👉 **http://127.0.0.1:8000**

---

## 🏠 2. Melihat Portal Berita (Halaman Depan)

Halaman utama adalah tempat pengunjung melihat berita.
- **Headline:** Berita terbaru akan muncul paling besar di bagian atas.
- **Daftar Berita:** Berita lainnya akan muncul di bawahnya dalam bentuk kartu-kartu rapi.
- **Terpopuler:** Di bagian samping kanan, Anda bisa melihat daftar berita yang sedang tren.

---

## 🛠 3. Mengelola Berita (Halaman Admin)

Untuk menambah, mengubah, atau menghapus berita, Anda harus masuk ke Dashboard Admin.
👉 **Akses di:** [http://127.0.0.1:8000/admin](http://127.0.0.1:8000/admin)

### A. Menambah Berita Baru
1.  Klik tombol **"Tulis Berita Baru"** di pojok kanan atas.
2.  Isi **Judul Berita** yang menarik.
3.  Tulis **Isi Berita** secara lengkap.
4.  Pilih **Gambar Utama** (opsional tapi disarankan agar tampilan bagus).
5.  Klik **Simpan**, dan berita akan langsung muncul di halaman depan.

### B. Mengubah Berita (Edit)
1.  Di tabel daftar berita, klik ikon **Pensil ✏️** pada berita yang ingin diubah.
2.  Lakukan perubahan pada judul atau isi.
3.  Klik **Update**.

### C. Menghapus Berita
1.  Klik ikon **Tempat Sampah 🗑️** pada berita yang ingin dihapus.
2.  Konfirmasi penghapusan, dan berita akan hilang permanen dari database.

---

## ❓ FAQ (Pertanyaan Sering Muncul)

- **Q: Kenapa gambarnya tidak muncul?**
  A: Pastikan Anda sudah menjalankan perintah `php artisan storage:link` di terminal agar sistem bisa membaca folder penyimpanan gambar.
- **Q: Kenapa muncul tulisan "Error" saat dibuka?**
  A: Pastikan terminal yang menjalankan `composer dev` tidak ditutup. Server harus tetap menyala selama Anda menggunakan aplikasi.

---
*Dibuat dengan ❤️ untuk kemudahan pengelolaan informasi.*
