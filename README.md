<h3 align="center">Mamasa WECRA (Weaving Craft Marketplace)</h3>

---

<p align="center">
  <img src="https://github.com/user-attachments/assets/6ea20b1c-762f-4fc2-98b8-fb3785782673" alt=" " width="200"/>
</p>

<p align="center">
  <strong>ARNI</strong><br/><br/>
  <strong>D0223536</strong><br/><br/>
  <strong>Framework Web Based</strong><br/><br/>
  <strong>2025</strong>
</p>

---
## Role dan Fitur-Fiturnya
### 1. Admin
- Memantau dan mereview aktivitas pengguna dan transaksi

### 2. Penjual
- Menambah, mengedit, dan menghapus produk
- Melihat daftar produk miliknya
- Melihat riwayat transaksi terkait produk yang dijual
- Mengatur rekening bank untuk menerima pembayaran

### 3. Pembeli
- Melihat dan mencari produk
- Melakukan pembelian
- Melihat riwayat transaksi pribadi

---

## Tabel-tabel database beserta field dan tipe datanya
### 1. Tabel `users`
| Field        | Tipe Data | Keterangan                           |
|--------------|-----------|---------------------------------------|
| id           | INT       | Primary Key                          |
| nama         | VARCHAR   | Nama pengguna                        |
| email        | VARCHAR   | Email unik                           |
| password     | VARCHAR   | Kata sandi terenkripsi               |
| alamat       | VARCHAR   | Alamat pengguna                      |
| no_telepon   | VARCHAR   | Nomor HP                             |
| role         | ENUM      | admin / penjual / pembeli            |
| created_at   | TIMESTAMP | Timestamp otomatis Laravel           |
| updated_at   | TIMESTAMP | Timestamp otomatis Laravel           |

---

### 2. Tabel `kategori`
| Field         | Tipe Data | Keterangan                           |
|---------------|-----------|---------------------------------------|
| id            | INT       | Primary Key                          |
| nama_kategori | VARCHAR   | Nama kategori produk                 |

---

### 3. Tabel `produk`
| Field         | Tipe Data | Keterangan                                |
|---------------|-----------|--------------------------------------------|
| id            | INT       | Primary Key                               |
| id_user       | INT       | FK ke `users.id` (penjual)                |
| id_kategori   | INT       | FK ke `kategori.id`                       |
| nama_produk   | VARCHAR   | Nama produk                               |
| deskripsi     | TEXT      | Deskripsi produk                          |
| stok          | INT       | Jumlah stok                               |
| harga         | DECIMAL   | Harga produk                              |
| foto_produk   | VARCHAR   | Path gambar produk                        |
| created_at    | TIMESTAMP | Timestamp otomatis Laravel               |
| updated_at    | TIMESTAMP | Timestamp otomatis Laravel               |

---

### 4. Tabel `keranjang`
| Field      | Tipe Data | Keterangan                                |
|------------|-----------|--------------------------------------------|
| id         | INT       | Primary Key                               |
| id_user    | INT       | FK ke `users.id` (pembeli)                |
| id_produk  | INT       | FK ke `produk.id`                         |
| jumlah     | INT       | Jumlah produk yang ditambahkan            |
| created_at | TIMESTAMP | Timestamp otomatis Laravel                |
| updated_at | TIMESTAMP | Timestamp otomatis Laravel                |

---

### 5. Tabel `transaksi`
| Field              | Tipe Data | Keterangan                                         |
|--------------------|-----------|----------------------------------------------------|
| id                 | INT       | Primary Key                                        |
| id_user            | INT       | FK ke `users.id` (pembeli)                        |
| tanggal            | DATETIME  | Tanggal transaksi                                 |
| metode_pembayaran  | ENUM      | transfer / cod                                     |
| status_pembayaran  | ENUM      | pending / sudah bayar / cod / dibatalkan          |
| status_pengiriman  | ENUM      | belum dikirim / dikirim / diterima                |
| status_penarikan   | ENUM      | tertahan / dibayar ke penjual / dikembalikan      |
| total_harga        | DECIMAL   | Total keseluruhan belanja                         |
| created_at         | TIMESTAMP | Timestamp otomatis Laravel                         |
| updated_at         | TIMESTAMP | Timestamp otomatis Laravel                         |

---

### 6. Tabel `detail_transaksi`
| Field          | Tipe Data | Keterangan                             |
|----------------|-----------|-----------------------------------------|
| id             | INT       | Primary Key                            |
| id_transaksi   | INT       | FK ke `transaksi.id`                   |
| id_produk      | INT       | FK ke `produk.id`                      |
| jumlah         | INT       | Jumlah produk dibeli                   |
| subtotal       | DECIMAL   | Total harga dari produk * jumlah       |
| created_at     | TIMESTAMP | Timestamp otomatis Laravel             |
| updated_at     | TIMESTAMP | Timestamp otomatis Laravel             |

---

### 7. Tabel `rekening_bank`
| Field        | Tipe Data | Keterangan                                  |
|--------------|-----------|----------------------------------------------|
| id           | INT       | Primary Key                                 |
| id_user      | INT       | FK ke `users.id` (penjual) – UNIQUE         |
| nama_bank    | VARCHAR   | Nama bank (contoh: BRI, BCA, Mandiri, dll)  |
| no_rekening  | VARCHAR   | Nomor rekening                              |
| atas_nama    | VARCHAR   | Nama pemilik rekening                       |
| created_at   | TIMESTAMP | Timestamp otomatis Laravel                  |
| updated_at   | TIMESTAMP | Timestamp otomatis Laravel                  |

---
## Jenis relasi dan tabel yang berelasi

| Relasi                               | Jenis Relasi  |
|--------------------------------------|----------------|
| `users` → `produk`                   | One to Many    |
| `kategori` → `produk`                | One to Many    |
| `users` → `keranjang`                | One to Many    |
| `produk` → `keranjang`               | One to Many    |
| `users` → `transaksi`                | One to Many    |
| `transaksi` → `detail_transaksi`    | One to Many    |
| `produk` → `detail_transaksi`       | One to Many    |
| `produk` ↔ `transaksi` *(via detail_transaksi)* | Many to Many |
| `users` → `rekening_bank`           | One to One     |

---
