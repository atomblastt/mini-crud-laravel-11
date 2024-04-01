Persyaratan :
PHP versi 8.2 atau yang lebih baru.
MySQL sebagai basis data.
Composer terinstal di perangkat Anda.

Langkah-langkah Instalasi :
1. Clone Repository
git clone <url-repository>
cd nama-folder-proyek
2. Instal Dependensi
composer install
3. Buat file .env
cp .env.example .env (atau copy secara manual file .env.example dan rubah namanya menjadi .env)
4. Atur Konfigurasi Database
 - Buka file .env dan sesuaikan pengaturan database:
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=lokatani (for example)
    DB_USERNAME=root
    DB_PASSWORD=
5. Jalankan Migrasi dan Seeder
php artisan migrate:fresh --seed 
6. Jalankan perintah
php artisan serve (untuk menjalankan project, dan lihat pada cmd server run di port berapa, untuk default biasanya di http://localhost:8000/ dan jalankan url tersebut di browser).

Komponen yang Digunakan :
- Laravel Framework v11: Menggunakan versi terbaru dari framework Laravel untuk fitur-fitur terbaru dan peningkatan keamanan.
- MySQL: Digunakan sebagai sistem manajemen basis data.
- Bootstrap v5: Framework front-end untuk desain responsif dan estetika yang modern.
- Service dan Repository: Penggunaan Service dan Repository Pattern untuk pemisahan logika bisnis dan akses basis data, meningkatkan modularitas.
- Ajax + Modal: Menggunakan teknologi Ajax untuk mengirim permintaan asinkronus ke server dan menampilkan modal untuk interaksi pengguna yang lebih baik.
- CRUD User Personal: Proyek ini berisi operasi CRUD sederhana untuk entitas "User Personal" sebagai studi kasus.
Dengan mengikuti langkah-langkah di atas, Anda sekarang telah menyiapkan proyek Laravel di perangkat lokal Anda dan dapat mulai menjelajahi fitur-fiturnya. Selamat mencoba...