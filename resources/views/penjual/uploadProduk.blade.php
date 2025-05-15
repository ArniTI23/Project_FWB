<!-- filepath: d:\Aplikasi\laragon\www\ProjectFWB\resources\views\penjual\uploadProduk.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mt-20">
    <h2 class="text-dark text-center">Upload Produk</h2>
    
    <div class="row justify-content-center mt-4">
        <div class="col-md-8 col-lg-6">
            <form action="{{ route('tambahProduk') }}" method="POST" enctype="multipart/form-data" class="text-dark">
                @csrf

                <!-- Nama Produk -->
                <div class="mb-3">
                    <label for="nama_produk" class="form-label text-dark">Nama Produk</label>
                    <input type="text" class="form-control border text-dark" name="nama_produk" id="nama_produk" required>
                </div>

                <!-- Deskripsi -->
                <div class="mb-3">
                    <label for="deskripsi" class="form-label text-dark">Deskripsi</label>
                    <textarea class="form-control border text-dark" name="deskripsi" id="deskripsi" rows="4" required></textarea>
                </div>
                
                <!-- Stok -->
                <div class="mb-3">
                    <label for="stok" class="form-label text-dark">Stok</label>
                    <input type="number" step="0.01" class="form-control border text-dark" name="stok" id="stok" required>
                </div>
                
                <!-- Harga -->
                <div class="mb-3">
                    <label for="harga" class="form-label text-dark">Harga (Rp)</label>
                    <input type="number" step="0.01" class="form-control border text-dark" name="harga" id="harga" required>
                </div>

                <!-- Foto Produk -->
                <div class="mb-3">
                    <label for="foto_produk" class="form-label text-dark">Foto Produk</label>
                    <input type="file" class="form-control border text-dark" name="foto_produk" id="foto_produk" accept="image/*">
                </div>

                <button type="submit" class="btn btn-primary w-100">Upload Produk</button>
            </form>
        </div>
    </div>
</div>
@endsection