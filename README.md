<div align="center">

```
██████╗ ██╗    ██╗██╗         ██████╗ ██████╗  ██████╗      ██╗███████╗ ██████╗████████╗
██╔══██╗██║    ██║██║         ██╔══██╗██╔══██╗██╔═══██╗     ██║██╔════╝██╔════╝╚══██╔══╝
██████╔╝██║ █╗ ██║██║         ██████╔╝██████╔╝██║   ██║     ██║█████╗  ██║        ██║   
██╔═══╝ ██║███╗██║██║         ██╔═══╝ ██╔══██╗██║   ██║██   ██║██╔══╝  ██║        ██║   
██║     ╚███╔███╔╝███████╗    ██║     ██║  ██║╚██████╔╝╚█████╔╝███████╗╚██████╗   ██║   
╚═╝      ╚══╝╚══╝ ╚══════╝    ╚═╝     ╚═╝  ╚═╝ ╚═════╝  ╚════╝ ╚══════╝ ╚═════╝   ╚═╝   
```

# Pemrograman Web Lanjut

### *Advanced Web Programming — Semester 4 Repository*

<br/>

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![Blade](https://img.shields.io/badge/Blade_Template-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)

<br/>

> *"The web is not a technology. It's a conversation."* — Mike Loukides

<br/>

[![GitHub commits](https://img.shields.io/github/commit-activity/m/athfizh/Pemrograman-Web-Lanjut?style=flat-square&color=4ade80&label=Commits)](https://github.com/athfizh/Pemrograman-Web-Lanjut/commits)
[![GitHub repo size](https://img.shields.io/github/repo-size/athfizh/Pemrograman-Web-Lanjut?style=flat-square&color=60a5fa&label=Repo%20Size)](https://github.com/athfizh/Pemrograman-Web-Lanjut)
[![GitHub last commit](https://img.shields.io/github/last-commit/athfizh/Pemrograman-Web-Lanjut?style=flat-square&color=f472b6&label=Last%20Update)](https://github.com/athfizh/Pemrograman-Web-Lanjut)

</div>

---

## 👤 Identitas Mahasiswa

<table>
  <tr>
    <td><b>Nama</b></td>
    <td>Athaulla Hafizh</td>
  </tr>
  <tr>
    <td><b>Username GitHub</b></td>
    <td><a href="https://github.com/athfizh">@athfizh</a></td>
  </tr>
  <tr>
    <td><b>Mata Kuliah</b></td>
    <td>Pemrograman Web Lanjut</td>
  </tr>
  <tr>
    <td><b>Program Studi</b></td>
    <td>DIV - Teknik Informatika</td>
  </tr>
</table>

---

## 📂 Struktur Repository

```
Pemrograman-Web-Lanjut/
│
├── 📁 jobsheet1/               # Praktikum 1
├── 📁 jobsheet2/               # Praktikum 2
├── 📁 jobsheet3/               # Praktikum 3
├── 📁 jobsheet4/               # Praktikum 4
├── 📁 jobsheet5/               # Praktikum 5
├── 📁 jobsheet6/               # Praktikum 6
├── 📁 jobsheet7/               # Praktikum 7
├── 📁 jobsheet9/               # Praktikum 9
├── 📁 jobsheet10/              # Praktikum 10
│
└── 📁 laporan praktikum/       # Kumpulan laporan resmi praktikum
```

---

## 📋 Daftar Jobsheet

| No | Jobsheet | Link |
|----|----------|------|
| 1 | Jobsheet 1 | [📁 jobsheet1](./jobsheet1) |
| 2 | Jobsheet 2 | [📁 jobsheet2](./jobsheet2) |
| 3 | Jobsheet 3 | [📁 jobsheet3](./jobsheet3) |
| 4 | Jobsheet 4 | [📁 jobsheet4](./jobsheet4) |
| 5 | Jobsheet 5 | [📁 jobsheet5](./jobsheet5) |
| 6 | Jobsheet 6 | [📁 jobsheet6](./jobsheet6) |
| 7 | Jobsheet 7 | [📁 jobsheet7](./jobsheet7) |
| 9 | Jobsheet 9 | [📁 jobsheet9](./jobsheet9) |
| 10 | Jobsheet 10 | [📁 jobsheet10](./jobsheet10) |

---

## 🛠️ Tech Stack

<div align="center">

| Layer | Teknologi |
|-------|-----------|
| **Backend Framework** | Laravel (PHP) |
| **Frontend** | Blade Template, HTML5, CSS3, JavaScript |
| **Database** | MySQL |
| **Tools** | Composer, NPM, Git |

</div>

---

## 🚀 Cara Menjalankan Project

> Panduan ini berlaku untuk jobsheet yang berbasis Laravel penuh (memiliki `composer.json`). Jobsheet yang hanya berisi latihan HTML/CSS/PHP tidak memerlukan langkah ini.

```bash
# 1. Clone repository ini
git clone https://github.com/athfizh/Pemrograman-Web-Lanjut.git
cd Pemrograman-Web-Lanjut

# 2. Masuk ke folder jobsheet yang ingin dijalankan
cd jobsheet3  # ganti sesuai jobsheet yang diinginkan

# 3. Install dependencies
composer install
npm install

# 4. Salin file environment
cp .env.example .env

# 5. Generate application key
php artisan key:generate

# 6. Konfigurasi database di file .env
# DB_DATABASE=nama_database
# DB_USERNAME=root
# DB_PASSWORD=

# 7. Jalankan migrasi database
php artisan migrate --seed

# 8. Jalankan server
php artisan serve
```

---

## 📌 Highlight Project

### 🏪 Sistem Point of Sale (POS)

Aplikasi kasir sederhana berbasis web yang dibangun menggunakan **Laravel** dengan fitur:
- ✔️ Manajemen produk (tambah, edit, hapus, lihat)
- ✔️ Transaksi penjualan
- ✔️ Relasi database dengan Eloquent ORM
- ✔️ Validasi form dan autentikasi
- ✔️ Antarmuka dinamis dengan JavaScript

---

## 📄 Laporan Praktikum

Semua laporan resmi dari setiap pertemuan praktikum tersimpan di folder [`laporan praktikum/`](./laporan%20praktikum/). Laporan mencakup:
- Tujuan dan dasar teori
- Langkah-langkah pengerjaan
- Screenshot hasil
- Kesimpulan dan analisis

---

## 🎯 Capaian Pembelajaran

Melalui mata kuliah ini, mahasiswa mampu:

- [x] Memahami dan mengimplementasikan **MVC Architecture** menggunakan Laravel
- [x] Membangun aplikasi web dinamis dengan **CRUD operations**
- [x] Menggunakan **Eloquent ORM** untuk manajemen database
- [x] Mengintegrasikan **JavaScript** untuk interaktivitas frontend
- [x] Menerapkan **autentikasi** dan **otorisasi** pengguna

---

## 📬 Kontak

<div align="center">

**Athaulla Hafizh**

[![GitHub](https://img.shields.io/badge/GitHub-athfizh-181717?style=for-the-badge&logo=github)](https://github.com/athfizh)

</div>

---

<div align="center">

<sub>⭐ Repository ini dibuat untuk keperluan akademik mata kuliah Pemrograman Web Lanjut</sub>

<br/>

</div>
