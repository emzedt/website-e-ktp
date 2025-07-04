# Perancangan Sistem Informasi E-KTP Berbasis Website

Repositori ini berisi kode sumber dan dokumentasi untuk proyek UAS mata kuliah *Analisis Proses Bisnis dan Desain Sistem*, yaitu sebuah sistem informasi pendaftaran E-KTP baru berbasis website.

Proyek ini dirancang oleh **Kelompok 10**, Program Studi Sistem Informasi, Universitas Bunda Mulia.

---

## 👨‍💻 Tim Pengembang

* Muhammad Zaidan (31210053)
* Rafael Gerhard Bani (31210015)
* William Heber (31210072)

---

## 📋 Deskripsi Proyek

Saat ini, sistem pelayanan di Dinas Kependudukan dan Pencatatan Sipil (DISDUKCAPIL) masih bersifat manual, terutama dalam proses pembuatan E-KTP. Hal ini menimbulkan berbagai keluhan dari masyarakat.

Website ini dirancang untuk:

* Mempercepat proses pembuatan KTP.
* Mempermudah masyarakat dalam melakukan pendaftaran E-KTP, terutama yang berada di daerah dengan akses terbatas ke kantor DISDUKCAPIL.
* Mendukung prinsip *good governance* dalam pelayanan publik.

---

## 🌟 Fitur Utama

### 👤 Pemohon (User)

* Registrasi dan login akun.
* Mengisi form pendaftaran E-KTP baru.
* Mengecek status E-KTP melalui 3 tahapan:

  * Verifikasi Data
  * Rekam Data
  * Pengiriman
* Menghubungi admin melalui halaman *Contact Us*.

### 🧾 Petugas Layanan

* Memverifikasi data pendaftaran dari pemohon.
* Menyetujui atau menolak data pendaftaran.

### 📷 Petugas Perekam

* Menerima data dari petugas layanan.
* Merekam data dan menampilkan pratinjau E-KTP.

### 🖨️ Operator

* Mencetak E-KTP fisik.
* Menyerahkan E-KTP ke kurir untuk pengiriman.

### 🚚 Kurir

* Melihat daftar pengiriman.
* Mengubah status pengiriman menjadi *selesai diantar*.

### 🔐 Admin

* Mengakses seluruh modul sistem.
* Mengelola data pengguna.

---

## 🛠️ Teknologi yang Digunakan

* **Frontend**: HTML, CSS, JavaScript
* **Backend**: PHP
* **Database**: MySQL
* **Database Management Tool**: PhpMyAdmin

---

## 🧩 Desain dan Metodologi

* **Metode Pengembangan**: *Waterfall*

  * Tahapan: Planning → Analysis → Design → Implementation → Testing → Maintenance

* **Alat Perancangan Sistem**:

  * Data Flow Diagram (DFD)
  * Unified Modeling Language (UML): Use Case, Activity, Sequence, Class Diagram
  * Entity-Relationship Diagram (ERD)
  * Mockup Desain Antarmuka (UI)

---

## 🖼️ Tangkapan Layar

1. Halaman Registrasi & Login
2. Halaman Utama (Menu Pelayanan)
3. Halaman Pendaftaran E-KTP
4. Halaman Cek Status

---

## 🚀 Cara Menjalankan Proyek

### 1. Clone Repositori

```bash
git clone https://github.com/emzedt/website-e-ktp.git
```

### 2. Setup Database

* Buka PhpMyAdmin.
* Buat database baru bernama `ektp`.
* Impor file `ektp.sql` ke database tersebut.

### 3. Konfigurasi Koneksi

* Buka file `config.php` atau `koneksi.php`.
* Sesuaikan nama database, username, dan password.

### 4. Jalankan di Localhost

* Pindahkan folder proyek ke `htdocs` (XAMPP) atau `www` (Laragon).
* Akses di browser melalui `http://localhost/nama-folder-proyek`.

---

## 📚 Catatan

Dokumen ini dibuat sebagai bagian dari tugas Ujian Akhir Semester (UAS) mata kuliah *Analisis Proses Bisnis dan Desain Sistem*
**Dosen Pengampu**: Bhustomy Hakim, S.SI, M.Eng.
