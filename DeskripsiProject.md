# Mamasa WECRA
Mamasa WECRA (Weaving Craft Marketplace) adalah aplikasi toko online berbasis Laravel yang menjual kain tenun khas Mamasa secara digital.

# Role & Aktivitas: 
1. Admin
- Mereview dan memantau aktivitas pengguna dan transaksi.

2. Penjual
- Menambah, mengedit, dan menghapus produk
- Melihat daftar produk mereka sendiri
- Melihat riwayat transaksi terkait produk yang dijual

3. Pembeli
- Melihat dan mencari produk
- Melakukan pembelian
- Melihat riwayat transaksi pribadi

# Daftar Tabel & Field:
1. users
- id
- nama
- email
- password
- alamat
- no_telepon
- id_role

2. roles
- id
- nama_role (admin / penjual / pembeli)
  
3. produk
- id
- id_user (penjual)
- id_kategori
- nama_produk
- deskripsi
- stok
- harga
- foto_produk
  
4. kategori
- id
- nama_kategori
  
5. transaksi
- id
- id_user (pembeli)
- tanggal
- status_pembayaran
- status_pengiriman
- total_harga

6. detail_transaksi
- id
- id_transaksi
- id_produk
- jumlah
- subtotal

# Relasi Antar Tabel
1. users – produk (One to Many)
2. users – transaksi (One to Many)
3. produk – detail_transaksi (One to Many)
4. transaksi – detail_transaksi (One to Many)
5. kategori – produk (One to Many)
6. roles – users (One to Many)
