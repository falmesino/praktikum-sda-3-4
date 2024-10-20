
# Tugas Praktikum SDA 3-4 Kelompok 1 ITBS Swadharma

 1. 231232001 Chaerul Figri
 2. 231232020 Fadhillah Muhammad Wahyudi
 3. 231232028 Falmesino Abdul Hamid
 4. 231232021 M Rivaldi Fahru
 5. 231232027 Tegar FB

## Penjelasan Implementasi SLLC

### Fungsi dan Tujuan Program

Program ini dibuat untuk mengelola barang-barang di sebuah gudang menggunakan **daftar melingkar** (Circular Linked List). Setiap barang direpresentasikan sebagai node yang menyimpan nama dan jumlah barang. Barang-barang ini disimpan dalam struktur **CircularItemList**, yang memungkinkan penambahan barang baru dan penampilan semua barang yang sudah ada.

### Fungsi Utama yang Digunakan

1. **`__construct($itemName, $quantity)`** pada kelas `ItemNode`:
   - Fungsi ini adalah **constructor** yang dipanggil saat membuat objek barang baru.
   - Parameter yang diterima adalah `$itemName` (nama barang) dan `$quantity` (jumlah barang). Objek baru akan menyimpan informasi ini dan mengatur properti `$next` (penghubung ke item berikutnya) menjadi `null`.

2. **`addItem($itemName, $quantity = 0)`** pada kelas `CircularItemList`:
   - Fungsi ini digunakan untuk menambahkan barang baru ke daftar.
   - Jika daftar kosong (di mana `$head` adalah `null`), barang pertama akan menjadi **head** dan **tail**, dengan referensi ke dirinya sendiri untuk membuat daftar menjadi melingkar.
   - Jika sudah ada barang, barang baru akan ditambahkan di posisi **tail** (ekor) dan **tail** baru ini akan menunjuk kembali ke **head**, menjaga daftar tetap melingkar.

3. **`displayItems()`** pada kelas `CircularItemList`:
   - Fungsi ini digunakan untuk menampilkan semua barang yang ada di dalam daftar.
   - Dimulai dari **head**, program akan mengumpulkan nama dan jumlah barang, kemudian beralih ke barang berikutnya menggunakan referensi `$next`.
   - Proses ini terus berulang hingga kembali lagi ke **head**, yang menandakan bahwa kita sudah melewati semua barang dalam daftar.
   - Hasilnya berupa string berisi daftar semua barang dengan jumlahnya.

### Contoh Penggunaan dan Output

Pada bagian ini:
```php
$itemList = new CircularItemList();
$itemList->addItem("Laptop", 2);
$itemList->addItem("Printer", 3);
$itemList->addItem("Scanner", 4);
```

- **`addItem()`** digunakan untuk menambahkan tiga barang: "Laptop", "Printer," dan "Scanner" beserta jumlah masing-masing.
- Setelah itu, **`displayItems()`** dipanggil untuk menampilkan semua barang dalam format yang lebih mudah dibaca.

### Alur Logika:
1. **Penambahan Barang**:
   - Setiap kali fungsi `addItem()` dipanggil, barang baru akan ditempatkan di posisi terakhir (ekor) dan ekor tersebut akan menunjuk kembali ke barang pertama (head), menjaga struktur melingkar.
   
2. **Penampilan Barang**:
   - Fungsi `displayItems()` akan menggunakan **do-while loop** untuk menelusuri daftar dari **head** hingga kembali ke **head**, sambil mencatat nama dan jumlah setiap barang.

### Output yang Dihasilkan:
Ketika kode dijalankan, hasilnya akan menampilkan daftar barang seperti ini:
```
Available Items in Warehouse:
Item: Laptop, Quantity: 2
Item: Printer, Quantity: 3
Item: Scanner, Quantity: 4
```

### Kesimpulan Teknis
Program ini menggunakan dua fungsi utama: **`addItem()`** untuk menambahkan barang ke daftar dan **`displayItems()`** untuk menampilkan barang-barang dalam daftar melingkar. Barang-barang terhubung satu sama lain dalam bentuk siklus, yang memungkinkan traversal tanpa titik akhir.

 
## Penjelasan Implementasi DLLC

Berikut adalah penjelasan lebih teknis mengenai kode program ini yang menggunakan **DLLC (Doubly Linked List Circular)** untuk mengelola log pengeluaran barang di gudang:

### Fungsi dan Tujuan Program

Program ini digunakan untuk mencatat **log pengeluaran barang** di gudang menggunakan struktur **DLLC** atau **Daftar Berantai Ganda Melingkar**. Setiap log mencatat nama barang, jumlah barang yang dikeluarkan, serta waktu pengeluarannya. Barang-barang ini dihubungkan secara melingkar di mana setiap item memiliki referensi ke item berikutnya dan sebelumnya.

### Fungsi Utama yang Digunakan

1. **`__construct($itemName, $quantity, $timestamp)`** pada kelas `LogNode`:
   - Fungsi ini adalah **constructor** untuk membuat **node log** baru yang menyimpan nama barang (`$itemName`), jumlah barang (`$quantity`), dan waktu pengeluaran (`$timestamp`).
   - Properti `$next` dan `$prev` diinisialisasi sebagai `null`, yang akan digunakan untuk menghubungkan node secara ganda.

2. **`addLog($itemName, $quantity)`** pada kelas `CircularLogList`:
   - Fungsi ini digunakan untuk menambahkan log baru ke dalam daftar log barang yang telah dikeluarkan.
   - Setiap kali barang ditambahkan, timestamp atau waktu pencatatan akan diambil menggunakan fungsi `date("Y-m-d H:i:s")`.
   - Jika daftar log kosong, barang pertama akan menjadi **head** (kepala) dan **tail** (ekor), dengan **tail** menunjuk kembali ke **head** dan **head** menunjuk ke **tail**.
   - Jika log sudah ada, barang baru akan ditambahkan di posisi **tail**, lalu referensi ganda akan diatur: node sebelumnya (`prev`) dari barang baru menunjuk ke **tail** lama, dan barang baru menjadi **tail** yang menunjuk kembali ke **head**.

3. **`displayLogs()`** pada kelas `CircularLogList`:
   - Fungsi ini menampilkan seluruh log pengeluaran barang yang ada di daftar.
   - Dimulai dari **head**, setiap node akan ditelusuri menggunakan referensi ke node berikutnya (`$next`) hingga kembali lagi ke **head**.
   - Setiap log yang ditemukan akan ditambahkan ke variabel string `$logOutput`, yang menyimpan informasi berupa nama barang, jumlah, dan waktu pencatatan log.

### Contoh Penggunaan dan Output

Pada bagian ini:
```php
$logList = new CircularLogList();
$logList->addLog('Laptop', 6);
$logList->addLog('Printer', 3);
$logList->addLog('Scanner', 2);
$logList->addLog('Mouse', 2);
```

- **`addLog()`** digunakan untuk menambahkan log pengeluaran barang dengan nama barang dan jumlah yang dikeluarkan.
- Setelah itu, **`displayLogs()`** dipanggil untuk menampilkan semua log pengeluaran barang dalam format yang lebih mudah dibaca.

### Alur Logika:

1. **Penambahan Log**:
   - Saat `addLog()` dipanggil, barang baru ditambahkan dengan timestamp yang mencatat waktu pengeluaran. Jika daftar kosong, barang pertama menjadi **head** dan **tail**, dan referensi antara **head** dan **tail** akan dibuat melingkar.
   - Jika daftar log sudah ada, log baru akan ditambahkan di ekor (**tail**) dan dihubungkan dengan node sebelumnya serta node pertama untuk mempertahankan struktur berantai ganda.

2. **Penampilan Log**:
   - Fungsi `displayLogs()` menggunakan **do-while loop** untuk menelusuri daftar dari **head** hingga kembali lagi ke **head**, mencatat nama barang, jumlah, dan waktu pencatatan log dari setiap node.

### Output yang Dihasilkan:
Ketika kode dijalankan, hasilnya akan menampilkan daftar log pengeluaran barang seperti ini:
```
Log of Exited Items:
Item: Laptop, Quantity: 6, Time: 2024-10-20 14:32:15
Item: Printer, Quantity: 3, Time: 2024-10-20 14:32:15
Item: Scanner, Quantity: 2, Time: 2024-10-20 14:32:15
Item: Mouse, Quantity: 2, Time: 2024-10-20 14:32:15
```

### Kesimpulan Teknis
Program ini menggunakan dua fungsi utama: **`addLog()`** untuk menambahkan log pengeluaran barang ke dalam daftar, dan **`displayLogs()`** untuk menampilkan semua log yang sudah dicatat. Dengan menggunakan **Doubly Linked List Circular**, setiap log barang memiliki referensi ke barang sebelumnya dan berikutnya, serta daftar ini melingkar sehingga bisa terus ditelusuri tanpa akhir.
