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

### 3. Pembeli
- Melihat dan mencari produk
- Melakukan pembelian
- Melihat riwayat transaksi pribadi

---

## Tabel-tabel database beserta field dan tipe datanya
### 1. Tabel `roles`
| Field        | Tipe Data | Keterangan                      |
|--------------|-----------|----------------------------------|
| id           | INT       | Primary Key                     |
| nama_role    | VARCHAR   | admin / penjual / pembeli       |

### 2. Tabel `users`
| Field        | Tipe Data | Keterangan                      |
|--------------|-----------|----------------------------------|
| id           | INT       | Primary Key                     |
| nama         | VARCHAR   | Nama pengguna                   |
| email        | VARCHAR   | Email unik                      |
| password     | VARCHAR   | Kata sandi                      |
| alamat       | VARCHAR   | Alamat pengguna                 |
| no_telepon   | VARCHAR   | Nomor HP                        |
| id_role      | INT       | Foreign Key ke `roles`          |

### 3. Tabel `kategori`
| Field        | Tipe Data | Keterangan                      |
|--------------|-----------|----------------------------------|
| id           | INT       | Primary Key                     |
| nama_kategori| VARCHAR   | Nama kategori                   |

### 4. Tabel `produk`
| Field        | Tipe Data | Keterangan                      |
|--------------|-----------|----------------------------------|
| id           | INT       | Primary Key                     |
| id_user      | INT       | Foreign Key ke `users` (penjual)|
| id_kategori  | INT       | Foreign Key ke `kategori`       |
| nama_produk  | VARCHAR   | Nama produk                     |
| deskripsi    | TEXT      | Deskripsi produk                |
| stok         | INT       | Jumlah stok                     |
| harga        | DECIMAL   | Harga produk                    |
| foto_produk  | VARCHAR   | Path gambar produk              |

### 5. Tabel `transaksi`
| Field            | Tipe Data | Keterangan                                |
|------------------|-----------|--------------------------------------------|
| id               | INT       | Primary Key                               |
| id_user          | INT       | Foreign Key ke `users` (pembeli)          |
| tanggal          | DATETIME  | Tanggal transaksi                         |
| status_pembayaran| ENUM      | pending / selesai / dibatalkan            |
| status_pengiriman| ENUM      | belum dikirim / dikirim / diterima        |
| total_harga      | DECIMAL   | Total harga transaksi                     |

### 6. Tabel `detail_transaksi`
| Field        | Tipe Data | Keterangan                          |
|--------------|-----------|--------------------------------------|
| id           | INT       | Primary Key                         |
| id_transaksi | INT       | Foreign Key ke `transaksi`          |
| id_produk    | INT       | Foreign Key ke `produk`             |
| jumlah       | INT       | Jumlah barang dibeli                |
| subtotal     | DECIMAL   | Total harga dari produk * jumlah    |

---

## Jenis relasi dan tabel yang berelasi
| Relasi               | Jenis Relasi  |
|----------------------|---------------|
| roles → users        | One to Many   |
| users → produk       | One to Many   |
| users → transaksi    | One to Many   |
| produk → detail_transaksi | One to Many   |
| transaksi → detail_transaksi | One to Many   |
| kategori → produk    | One to Many   |

---
