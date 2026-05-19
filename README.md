
# o-siakad

Ringkasan singkat: aplikasi Laravel modular (nwidart/laravel-modules) untuk manajemen akademik.

**Kebutuhan Sistem**:
- PHP 8.3+
- Composer
- Node.js + npm
- Database (MySQL/Postgres/SQLite)

**Quick links**: lihat `composer.json` dan `package.json` untuk dependensi dan script.

**Setup (singkat)**
1. Clone repo.
2. Salin file environment dan generate key.

```bash
git clone <repo-url>
cd o-siakad
composer install
cp .env.example .env
php artisan key:generate
```

3. Konfigurasi database di `.env` lalu jalankan migrasi dan seed (jika perlu):

```bash
php artisan migrate --force
php artisan db:seed --class=DatabaseSeeder
```

4. Install dependensi frontend dan build aset:

```bash
npm install
npm run build
```

Catatan: repository memiliki script composer `setup` yang menjalankan langkah-langkah umum; dapat dijalankan dengan `composer run setup`.

**Mode pengembangan**

```bash
composer run dev
```

atau menjalankan langkah manual:

```bash
php artisan serve
npm run dev
```

**Package (dependency penting)**
- Backend (Composer) — `composer.json` (dependensi runtime):

- `php`: ^8.3
- `avadim/fast-excel-laravel`: ^2.14
- `barryvdh/laravel-dompdf`: ^3.1
- `laravel/framework`: ^13.8
- `laravel/tinker`: ^3.0
- `nwidart/laravel-modules`: ^13.0
- `spatie/laravel-activitylog`: ^5.0
- `spatie/laravel-backup`: ^10.2
- `spatie/laravel-medialibrary`: ^11.22
- `spatie/laravel-permission`: ^7.4
- `spatie/laravel-schedule-monitor`: ^4.3
- `spatie/laravel-settings`: ^3.8
- `spatie/laravel-sitemap`: ^8.1
- `symfony/ux-chartjs`: ^3.0

- Dev dependencies (`composer.json` -> `require-dev`):

- `fakerphp/faker`: ^1.23
- `laravel/pail`: ^1.2.5
- `laravel/pao`: ^1.0.6
- `laravel/pint`: ^1.27
- `mockery/mockery`: ^1.6
- `nunomaduro/collision`: ^8.6
- `pestphp/pest`: ^4.7
- `pestphp/pest-plugin-laravel`: ^4.1

- Frontend (npm / devDependencies) — lihat `package.json`:

- `vite`: ^8.0.0
- `tailwindcss`: ^4.0.0
- `laravel-vite-plugin`: ^3.1
- `@tailwindcss/vite`: ^4.0.0
- `concurrently`: ^9.0.1

Untuk detail versi lengkap lihat [composer.json](composer.json) dan [package.json](package.json).

**Modul & Struktur**
- Proyek menggunakan `nwidart/laravel-modules`. Modul berada di folder `Modules/` dan di-autoload lewat namespace `Modules\\` -> `Modules/` (lihat `composer.json`).
- Contoh: `Modules/Mahasiswa/` berisi controller, model, migration, view, route modul tersendiri.
- Perintah berguna:

```bash
php artisan module:list
php artisan module:make NamaModul
php artisan module:migrate NamaModul
```

- Catatan: module routes biasanya didefinisikan di dalam modul (`Modules/<Modul>/Routes/web.php`) atau di-include oleh service provider modul.

**Lokasi penting**
- `app/Http/Controllers` : controller aplikasi utama
- `app/Models` : model global (mis. `User.php`)
- `Modules/` : kumpulan modul fungsional
- `routes/web.php` : route utama aplikasi
- `composer.json`, `package.json` : konfigurasi dependensi dan script build

**Selanjutnya / Kontribusi**
- Tambahkan dokumentasi modul individual di dalam masing-masing modul (`Modules/<NamaModul>/README.md`).
- Jika mau, saya bisa membuat dokumen terpisah untuk setiap modul utama.

**API / Routes**
- Route utama aplikasi didefinisikan di `routes/web.php` dan `routes/api.php`.
- Modul-modul juga dapat mendaftarkan route sendiri di dalam folder modul (`Modules/<Modul>/Routes/`).
- Untuk melihat semua route yang terdaftar jalankan:

```bash
php artisan route:list
```

- Untuk melihat route khusus API atau memfilter berdasarkan path gunakan opsi `--path` atau `--name`.
- Contoh request (jika ada endpoint API `GET /api/users`):

```bash
curl -sS -H "Accept: application/json" http://localhost:8000/api/users
```

- Jika aplikasi menggunakan autentikasi token (Sanctum/Passport), sertakan header `Authorization: Bearer <token>` pada request.

---

---

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
