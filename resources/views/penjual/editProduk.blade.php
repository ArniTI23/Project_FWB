<!-- filepath: d:\Aplikasi\laragon\www\ProjectFWB\resources\views\penjual\editProduk.blade.php -->
@extends('layouts.app')
@section('content')
<div class="container mt-5"> <!-- Tambahkan margin atas di sini -->
    <h2 class="text-dark text-center mb-4">Edit Produk</h2> <!-- Tambahkan judul untuk konteks -->
    <form class="forms-sample mt-4" method="POST" enctype="multipart/form-data"> <!-- Tambahkan margin atas pada form -->
        @csrf
        <!-- Nama Produk -->
        <div class="mb-4"> <!-- Tambahkan margin bawah yang lebih besar -->
            <label for="nama_produk" class="form-label text-dark">Nama Produk</label>
            <input type="text" class="form-control border text-dark" name="nama_produk" value="{{ $produk->nama_produk }}" id="nama_produk" required>
        </div>

        <!-- Deskripsi -->
        <div class="mb-4">
            <label for="deskripsi" class="form-label text-dark">Deskripsi</label>
            <textarea class="form-control border text-dark" name="deskripsi" id="deskripsi" rows="4" required>{{ $produk->deskripsi }}</textarea>
        </div>

        <!-- Stok -->
        <div class="mb-4">
            <label for="stok" class="form-label text-dark">Stok</label>
            <input type="number" step="0.01" class="form-control border text-dark" name="stok" value="{{ $produk->stok }}" id="stok" required>
        </div>

        <!-- Harga -->
        <div class="mb-4">
            <label for="harga" class="form-label text-dark">Harga (Rp)</label>
            <input type="number" step="0.01" class="form-control border text-dark" name="harga" value="{{ $produk->harga }}" id="harga" required>
        </div>

        <!-- Foto Produk -->
        <div class="mb-4">
            <label for="foto_produk" class="form-label text-dark">Foto Produk</label>
            <input type="file" class="form-control border text-dark" name="foto_produk" id="foto_produk" accept="image/*">
            @if ($produk->foto_produk)
                <img src="{{ asset('storage/' . $produk->foto_produk) }}" alt="Foto Produk" class="img-fluid mt-3" style="max-height: 150px;">
            @endif
        </div>

        <button type="submit" class="btn btn-primary w-100">Simpan Produk</button> <!-- Tombol diperlebar -->
    </form>
</div>
@endsection