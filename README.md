<h3 align="center">Mamasa WECRA </h3>

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
- Melihat user lain yang memiliki akun di database
- Menghapus akun penjual atau pembeli
- Menghapus produk yang di post oleh penjual

### 2. Penjual
- Menambah, mengedit, dan menghapus produk
- Melihat daftar produk miliknya
- Melihat riwayat penjualan (dari detail transaksi)

### 3. Pembeli
- Melihat dan mencari produk
- Melakukan pembelian
- Melihat riwayat pembelian pribadi

---

## Tabel-tabel database beserta field dan tipe datanya
### 1. Tabel `users`
| Field        | Tipe Data | Keterangan                           |
|--------------|-----------|---------------------------------------|
| id           | BIGINT    | Primary Key                          |
| name         | VARCHAR   | Nama pengguna                        |
| email        | VARCHAR   | Email unik                           |
| password     | VARCHAR   | Kata sandi terenkripsi               |
| role         | ENUM      | admin / penjual / pembeli            |
| remember_token | VARCHAR | Token untuk remember me (opsional)   |
| created_at   | TIMESTAMP | Waktu dibuat                         |
| updated_at   | TIMESTAMP | Waktu diubah                         |

---

### 2. Tabel `produk`
| Field         | Tipe Data | Keterangan                                |
|---------------|-----------|--------------------------------------------|
| id            | BIGINT    | Primary Key                               |
| id_user       | BIGINT    | FK ke `users.id` (penjual)                |
| nama_produk   | VARCHAR   | Nama produk                               |
| deskripsi     | TEXT      | Deskripsi produk                          |
| stok          | INTEGER   | Jumlah stok                               |
| harga         | DECIMAL   | Harga produk                              |
| foto_produk   | VARCHAR   | Path gambar produk                        |
| created_at    | TIMESTAMP | Waktu dibuat                              |
| updated_at    | TIMESTAMP | Waktu diubah                              |

---

### 3. Tabel `transaksi`
| Field              | Tipe Data | Keterangan                                         |
|--------------------|-----------|----------------------------------------------------|
| id                 | BIGINT    | Primary Key                                        |
| id_user            | BIGINT    | FK ke `users.id` (pembeli)                        |
| metode_pembayaran  | VARCHAR   | Metode pembayaran                                 |
| status_pembayaran  | ENUM      | pending / selesai / dibatalkan                    |
| total_harga        | DECIMAL   | Total keseluruhan belanja                         |
| created_at         | TIMESTAMP | Waktu dibuat                                      |
| updated_at         | TIMESTAMP | Waktu diubah                                      |

---

### 4. Tabel `detail_transaksi`
| Field          | Tipe Data | Keterangan                             |
|----------------|-----------|-----------------------------------------|
| id             | BIGINT    | Primary Key                            |
| id_transaksi   | BIGINT    | FK ke `transaksi.id`                   |
| id_produk      | BIGINT    | FK ke `produk.id`                      |
| jumlah         | INTEGER   | Jumlah produk dibeli                   |
| subtotal       | DECIMAL   | Total harga dari produk * jumlah       |
| created_at     | TIMESTAMP | Waktu dibuat                           |
| updated_at     | TIMESTAMP | Waktu diubah                           |

---

### 5. Tabel `profil`
| Field        | Tipe Data | Keterangan                            |
|--------------|-----------|----------------------------------------|
| id           | BIGINT    | Primary Key                           |
| user_id      | BIGINT    | FK ke `users.id`                      |
| foto_profil  | VARCHAR   | Path foto profil                      |
| bio          | TEXT      | Singkat tentang pengguna              |
| deskripsi    | TEXT      | Deskripsi lengkap pengguna            |
| created_at   | TIMESTAMP | Waktu dibuat                          |
| updated_at   | TIMESTAMP | Waktu diubah                          |

---

## Jenis Relasi dan Tabel yang Berelasi

| Relasi                             | Jenis Relasi  |
|------------------------------------|----------------|
| `users` → `produk`                 | One to Many    |
| `users` → `transaksi`             | One to Many    |
| `transaksi` → `detail_transaksi`  | One to Many    |
| `produk` → `detail_transaksi`     | One to Many    |
| `users` → `profil`                | One to One     |
| `produk` ↔ `transaksi` *(via detail_transaksi)* | Many to Many |

---
