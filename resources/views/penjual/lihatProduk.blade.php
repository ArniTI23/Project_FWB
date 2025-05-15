<!-- filepath: d:\Aplikasi\laragon\www\ProjectFWB\resources\views\penjual\lihatProduk.blade.php -->
@extends('layouts.app')
@section('content')

<div class="container mt-5">
    <h2 class="text-dark text-center mb-4">Daftar Produk</h2>
    
    <div class="row">
        @foreach ($produk as $p)
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100 shadow-sm">
                <!-- Tambahkan kelas custom untuk gambar -->
                <img src="{{ asset(Storage::url($p->foto_produk) ?? 'default.jpg') }}" class="card-img-top img-fixed" alt="Foto Produk">
                <div class="card-body">
                    <h5 class="card-title">{{ $p->nama_produk }}</h5>
                    <p class="card-text">Stok: {{ $p->stok }}</p>
                    <p class="card-text">Rp {{ number_format($p->harga) }}</p>
                    <div class="d-flex gap-2">
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal{{ $p->id }}">
                            Detail
                        </button>
                        <a href="{{route('editproduk',$p->id)}}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('hapusproduk',$p->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Produk -->
        <div class="modal fade" id="detailModal{{ $p->id }}" tabindex="-1" aria-labelledby="detailModalLabel{{ $p->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detailModalLabel{{ $p->id }}">Detail Produk</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <img src="{{ $p->foto_produk ? asset('storage/' . $p->foto_produk) : asset('default.jpg') }}" class="img-fluid mb-3" alt="Foto Produk">
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Nama Produk: </strong> {{ $p->nama_produk }}</li>
                            <li class="list-group-item"><strong>Deskripsi: </strong> {{ $p->deskripsi }}</li>
                            <li class="list-group-item"><strong>Stok: </strong> {{ $p->stok }}</li>
                            <li class="list-group-item"><strong>Harga: </strong> Rp {{ number_format($p->harga) }}</li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection