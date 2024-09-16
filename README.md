# Dokumentasi Laravel 11 Starter Kit

## Pendahuluan
Ini adalah starter kit Laravel 11 yang dibangun dengan Bootstrap 5. Aplikasi ini menyertakan beberapa library penting untuk manajemen peran, pengelolaan file, dan tabel data interaktif.

### Library Utama
- **Spatie Laravel Permissions**: Mengelola peran dan izin pengguna.
- **Spatie Media Library**: Mengelola file media seperti gambar.
- **DataTables**: Menyediakan tabel interaktif dengan pagination, filter, dan sorting.
- **Dropzone.js**: Mendukung upload file dengan drag-and-drop dan preview.

---

## Cara Menjalankan Aplikasi
Ikuti langkah-langkah ini untuk menyiapkan aplikasi di lingkungan lokal:

### Langkah-langkah:
1. **Clone repository:**
    ```bash
    git clone https://github.com/RahmatRafiq/Laravel-11-starter-kit-bootstrap5.git
    cd Laravel-11-starter-kit-bootstrap5
    ```

2. **Install dependencies:**
    ```bash
    composer install
    npm install
    ```

3. **Setup environment:**
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. **Konfigurasi database** di file `.env`, kemudian jalankan migration:
    ```bash
    php artisan migrate
    ```

5. **Jalankan server lokal:**
    ```bash
    php artisan serve
    ```

6. **Build front-end (opsional):**
    ```bash
    npm run dev
    ```

---

## Modifikasi pada File Helpers
Aplikasi ini memiliki dua helper utama: **DataTable Helper** dan **MediaLibrary Helper**.

### DataTable Helper:
- Lokasi: `app/Helpers/DataTable.php`
- Fungsi: Mengelola pagination dari query database dan mengembalikan data yang diperlukan oleh DataTables.

#### Contoh Penggunaan:
```php
use App\Helpers\DataTable;

public function index(Request $request)
{
     $query = User::query();
     return DataTable::paginate($query, $request);
}
```

### MediaLibrary Helper:
- Lokasi: `app/Helpers/MediaLibrary.php`
- Fungsi: Mengelola file media menggunakan Spatie Media Library.

#### Contoh Penggunaan:
```php
use App\Helpers\MediaLibrary;

public function store(Request $request, User $user)
{
     MediaLibrary::put($user, 'profile_pictures', $request);
}
```

---

## Cara Menggunakan Helpers

### DataTable Helper:
Helper ini digunakan untuk mengelola pagination di DataTables. Untuk menggunakannya, panggil fungsi `paginate` dari helper di controller dengan query yang diinginkan.

#### Contoh Penggunaan:
```php
use App\Helpers\DataTable;

public function getUsers(Request $request)
{
     $query = User::query();
     return DataTable::paginate($query, $request);
}
```

### MediaLibrary Helper:
Helper ini digunakan untuk mengelola file media (misalnya, gambar) yang terhubung dengan model.

#### Contoh Penggunaan:
```php
use App\Helpers\MediaLibrary;

public function updateProfilePicture(Request $request, User $user)
{
     MediaLibrary::put($user, 'profile_pictures', $request);
}

public function removeProfilePicture(User $user)
{
     MediaLibrary::destroy($user, 'profile_pictures');
}
```

---

## Implementasi Dropzone.js
Dropzone.js digunakan untuk upload file secara drag-and-drop. Berikut adalah cara menggunakannya:

#### Contoh Penggunaan:
```javascript
Dropzoner('#my-dropzone', 'images', {
     urlStore: '/upload',
     urlDestroy: '/delete',
     csrf: '[CSRF Token]',
     acceptedFiles: 'image/*',
     maxFiles: 5,
     kind: 'image',
     files: existingFiles,
});
```

---

## Kontributor
- [Rahmat Rafiq](https://github.com/RahmatRafiq)
- [Dzyfhuba](https://github.com/Dzyfhuba)

