# ♻️ Whrongshock

![Laravel](https://img.shields.io/badge/Laravel-10.x-red?logo=laravel)
![PHP](https://img.shields.io/badge/PHP-%3E%3D8.1-blue?logo=php)
![License](https://img.shields.io/badge/License-MIT-green)

Aplikasi manajemen **deposit dan penarikan sampah** berbasis Laravel.

---

## 🚀 Fitur
- 👤 Manajemen user dengan role (admin & user) menggunakan Spatie Permission
- 💰 Deposit dan penarikan saldo
- 🔄 Status penarikan menggunakan enum: `pending`, `approved`, `rejected`

---

## ⚙️ Requirement
- PHP >= 8.1
- Composer
- MySQL/MariaDB
- Laravel >= 10

---

## 🛠️ Instalasi

1. **Clone repository**
   ```
   git clone <repo-url>
   cd whrongshock
   ```

2. **Install dependency**
   ```
   composer install
   ```

3. **Copy file `.env` dan sesuaikan konfigurasi database**
   ```
   cp .env.example .env
   ```

4. **Generate key**
   ```
   php artisan key:generate
   ```

5. **Jalankan migrasi dan seeder**
   ```
   php artisan migrate --seed
   ```

6. **Jalankan aplikasi**
   ```
   php artisan serve
   ```
---

## 📄 Lisensi

MIT

---

> Dibuat dengan ❤️ menggunakan Laravel & Spatie Permission.
