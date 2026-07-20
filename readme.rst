# 🪑 Jepara Furniture

Jepara Furniture adalah aplikasi **e-commerce berbasis web** untuk penjualan furniture khas Jepara, dibangun menggunakan **PHP CodeIgniter**. Aplikasi ini mencakup katalog produk, keranjang belanja, checkout, konfirmasi pembayaran manual, layanan rehap (perbaikan) furniture, blog, hingga panel admin untuk mengelola toko.

---

## ✨ Fitur Utama

**Untuk Pelanggan**
- **Framework:** PHP CodeIgniter (versi 3.x)
- 🛒 Katalog produk & kategori furniture
- 🛍️ Keranjang belanja (*cart*) dan proses checkout
- 💳 Instruksi & konfirmasi pembayaran (upload bukti transfer)
- 🔧 **Layanan Rehap** — pengajuan permintaan perbaikan/renovasi furniture
- 📝 Blog seputar furniture
- ⭐ Testimoni pelanggan
- 🔐 Autentikasi (login/register) & profil pengguna
- 🔔 Notifikasi pesanan

**Untuk Admin**
- 📊 Dashboard admin
- 🏬 Manajemen profil toko
- 📦 Manajemen produk, kategori, pesanan, dan pembayaran
- 📈 Laporan (report) penjualan

---

## 🛠️ Tech Stack

- **Framework:** PHP CodeIgniter (versi 3.x)
- **Database:** MySQL
- **Frontend:** HTML, CSS, JavaScript (dengan asset bawaan di folder `assets/`)
- **Package Manager:** Composer

---

## 📁 Struktur Folder

```
jepara-furniture/
├── application/
│   ├── controllers/     # Auth, Cart, Checkout, Payment, Product, Rehap, Blog, dll.
│   │   └── admin/       # Controller khusus admin (Profil_toko, dll.)
│   ├── models/          # Cart_model, Order_model, Payment_model, Produk_model, dll.
│   ├── views/           # Tampilan halaman
│   ├── config/          # Konfigurasi aplikasi & database
│   └── helpers/
├── assets/              # CSS, JS, gambar
├── system/              # Core framework CodeIgniter
├── uploads/             # File upload (produk, bukti bayar, blog, testimonial, dll.)
├── database_migration.sql
├── sample_data.sql
├── composer.json
└── index.php
```

---

## 🚀 Instalasi & Menjalankan Proyek

### Prasyarat
- PHP >= 5.6 (disarankan PHP 7.x untuk kompatibilitas CodeIgniter 3)
- MySQL / MariaDB
- Web server (Apache/Nginx) — misalnya via **XAMPP/Laragon**
- Composer *(opsional, untuk dependency development)*

### 1. Clone Repository
```bash
git clone https://github.com/ChantikaAurora/jepara-furniture.git
cd jepara-furniture
```

### 2. Konfigurasi Database
Buat database baru bernama `db_jepara_furniture`, lalu import struktur dan data awal:
```bash
mysql -u root -p db_jepara_furniture < database_migration.sql
mysql -u root -p db_jepara_furniture < sample_data.sql
```

Sesuaikan koneksi database di `application/config/database.php` jika diperlukan:
```php
$db['default'] = array(
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'db_jepara_furniture',
    ...
);
```

### 3. Konfigurasi Base URL
Atur base URL aplikasi di `application/config/config.php` sesuai environment lokal, misalnya:
```php
$config['base_url'] = 'http://localhost/jepara-furniture/';
```

### 4. Jalankan Aplikasi
- Letakkan folder project di direktori web server (misalnya `htdocs` untuk XAMPP)
- Jalankan Apache & MySQL
- Akses melalui browser: `http://localhost/jepara-furniture/`

---

## 🗄️ Struktur Database (Ringkasan)

| Tabel               | Deskripsi                                  |
|---------------------|---------------------------------------------|
| `cart`              | Data keranjang belanja pengguna             |
| `orders`            | Data pesanan                                |
| `order_items`       | Detail item dalam setiap pesanan            |
| `payments`          | Data & bukti pembayaran                     |
| `rehap_requests`    | Permintaan layanan rehap furniture          |
| `blog_posts`        | Konten blog                                 |
| `testimonials`      | Testimoni pelanggan                         |
| `notifications`     | Notifikasi untuk pengguna                   |
| `store_profile`     | Informasi profil toko                       |

---

## 👩‍💻 Kontributor

- **Chantika Aurora Akmal** — Politeknik Negeri Padang, D4 Teknik Rekayasa Perangkat Lunak

---

## 📃 Lisensi

Proyek ini dibangun di atas framework **CodeIgniter** (MIT License). Silakan sesuaikan lisensi proyek ini sesuai kebutuhan Anda.
