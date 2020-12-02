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

## Instalasi
Pastikan laravel sudah terinstall di komputer anda, untuk tahap-tahap instalasi laravel bisa dilihat di [dokumentasi laravel](https://laravel.com/docs/7.x/#installation)

**1. Clone Project**

    git clone https://github.com/kelvin-azaria/Byr.SPP.git
**2. Buat Database**
	Buatlah database MySQL bernama "db_spp"

**3. Migrate table**
	Pada terminal ketik
	

    php artisan migrate

**4. Buka aplikasi di browser**
	Ketikan URL berikut di browser
	

    localhost:8000
