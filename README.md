# Byr.SPP
Byr.SPP adalah aplikasi manajemen data sekolah yang juga menghadirkan fungsi pembayaran SPP.

**Fitur - fitur :**

 - CRUD data siswa
 - CRUD data guru
 - CRUD data petugas
 - CRUD data kelas
 - CRUD data tahun ajaran
 - Pembayaran SPP siswa
 - Riwayat pembayaran SPP
 - Generate laporan riwayat pembayaran SPP

**Teknologi yang digunakan :**

 - [Laravel 7](https://laravel.com/docs/7.x/installation)
 - [Bootstrap 4](https://getbootstrap.com/)
 - JQuery
 - [SB Admin 2 Template](https://startbootstrap.com/theme/sb-admin-2)
 - Node Package Manager (NPM)
 - [Font Awesome](https://fontawesome.com/)
 - MySQL

## Instalasi
Pastikan laravel sudah terinstall di komputer anda, untuk tahap-tahap instalasi laravel bisa dilihat di [dokumentasi laravel](https://laravel.com/docs/7.x/#installation)

**1. Clone Project** <br>

    git clone https://github.com/kelvin-azaria/Byr.SPP.git
**2. Buat Database** <br>
	Buatlah database MySQL bernama "db_spp"

**3. Migrate table**<br>
	Pada terminal ketik
	

    php artisan migrate

**4. Jalankan aplikasi**<br>
	Ketikan command berikut ke terminal
	

    php artisan serve

**5. Buka aplikasi di browser**<br>
	Ketikan URL berikut di browser
	

    localhost:8000

**6. Selesai**
