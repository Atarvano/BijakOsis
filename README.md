<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Logo Laravel"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Status Build"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Unduhan"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Versi Stabil Terbaru"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="Lisensi"></a>
</p>

## Memulai

Setelah melakukan `git clone`, install Laravel dan Bootstrap terlebih dahulu karena repository ini hanya berisi file penting saja.

```bash
composer install
npm install
npm install bootstrap
npm run dev
```

Jangan lupa salin file `.env.example` menjadi `.env` dan generate key:

```bash
cp .env.example .env
php artisan key:generate
```

## Tentang Laravel

Laravel adalah framework aplikasi web dengan sintaks yang ekspresif dan elegan. Kami percaya pengembangan harus menjadi pengalaman yang menyenangkan dan kreatif agar benar-benar memuaskan. Laravel memudahkan pengembangan dengan menyederhanakan tugas-tugas umum yang sering digunakan dalam banyak proyek web, seperti:

-   [Mesin routing yang sederhana dan cepat](https://laravel.com/docs/routing).
-   [Container dependency injection yang kuat](https://laravel.com/docs/container).
-   Banyak backend untuk penyimpanan [session](https://laravel.com/docs/session) dan [cache](https://laravel.com/docs/cache).
-   [ORM database](https://laravel.com/docs/eloquent) yang ekspresif dan intuitif.
-   [Migrasi skema](https://laravel.com/docs/migrations) yang agnostik database.
-   [Pemrosesan job latar belakang yang tangguh](https://laravel.com/docs/queues).
-   [Broadcasting event real-time](https://laravel.com/docs/broadcasting).

Laravel mudah diakses, kuat, dan menyediakan alat yang dibutuhkan untuk aplikasi besar dan robust.

## Belajar Laravel

-   **[Redberry](https://redberry.international/laravel-development)**
-   **[Active Logic](https://activelogic.com)**

## Kontribusi

Terima kasih telah mempertimbangkan untuk berkontribusi pada framework Laravel! Panduan kontribusi dapat ditemukan di [dokumentasi Laravel](https://laravel.com/docs/contributions).

## Kode Etik

Agar komunitas Laravel tetap ramah untuk semua, silakan tinjau dan patuhi [Kode Etik](https://laravel.com/docs/contributions#code-of-conduct).

## Kerentanan Keamanan

Jika Anda menemukan kerentanan keamanan di Laravel, silakan kirim email ke Taylor Otwell melalui [taylor@laravel.com](mailto:taylor@laravel.com). Semua kerentanan keamanan akan segera ditangani.

## Lisensi

Framework Laravel adalah perangkat lunak open-source yang dilisensikan di bawah [lisensi MIT](https://opensource.org/licenses/MIT).
