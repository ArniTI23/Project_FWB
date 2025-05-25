<!-- filepath: d:\Aplikasi\laragon\www\ProjectFWB\resources\views\penjual\uploadProduk.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10"> <!-- Lebih lebar -->
            <div class="card shadow-lg" style="max-width:900px;margin:auto;"> <!-- Batasi max-width agar tetap proporsional -->
                <div class="card-header bg-primary text-white text-center py-2"> <!-- py-2 agar header lebih pendek -->
                    <h5 class="mb-0">Upload Produk</h5>
                </div>
                <div class="card-body text-dark py-3" style="padding-bottom:1rem;"> <!-- py-3 agar body lebih pendek -->
                    <form action="{{ route('tambahProduk') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Nama Produk -->
                        <div class="mb-2">
                            <label for="nama_produk" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" name="nama_produk" id="nama_produk" required>
                        </div>

                        <!-- Deskripsi -->
                        <div class="mb-2">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" id="deskripsi" rows="2" maxlength="100" required></textarea>
                        </div>
                        
                        <!-- Stok -->
                        <div class="mb-2">
                            <label for="stok" class="form-label">Stok</label>
                            <input type="number" step="0.01" class="form-control" name="stok" id="stok" required>
                        </div>
                        
                        <!-- Harga -->
                        <div class="mb-2">
                            <label for="harga" class="form-label">Harga (Rp)</label>
                            <input type="number" step="0.01" class="form-control" name="harga" id="harga" required>
                        </div>

                        <!-- Foto Produk -->
                        <div class="mb-3">
                            <label for="foto_produk" class="form-label">Foto Produk</label>
                            <input type="file" class="form-control" name="foto_produk" id="foto_produk" accept="image/*">
                        </div>

                        <!-- Tombol Submit -->
                        <button type="submit" class="btn btn-primary w-100">Upload Produk</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection