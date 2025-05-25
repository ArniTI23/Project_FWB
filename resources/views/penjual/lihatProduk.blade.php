<!-- filepath: d:\Aplikasi\laragon\www\ProjectFWB\resources\views\penjual\lihatProduk.blade.php -->
@extends('layouts.app')
@section('content')

{{-- <div class="container mt-5">
    <h2 class="text-dark text-center mb-4">Daftar Produk</h2>
     --}}
    <div class="card-body px-0 pb-2">
    <!-- Konten Produk -->
    <div class="container py-4">
        <div class="row">
            @foreach ($produk as $p)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ asset(Storage::url($p->foto_produk) ?? 'default.jpg') }}" class="card-img-top img-fixed" alt="{{ $p->nama_produk }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $p->nama_produk }}</h5>
                            <p class="card-text">Stok: {{ $p->stok }}</p>
                            <p class="card-text text-success">Rp {{ number_format($p->harga, 0, ',', '.') }}</p>
                            <div class="d-flex flex-wrap gap-2">
                                <!-- Tombol Detail -->
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal{{ $p->id }}">
                                    Detail
                                </button>
                                <!-- Tombol Edit -->
                                <a href="{{ route('editproduk',$p->id) }}" class="btn btn-success btn-sm">Edit</a>
                                <!-- Tombol Hapus -->
                                <form action="{{ route('hapusproduk', $p->id) }}" onsubmit="return confirm('Yakin ingin menghapus produk ini?')" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Produk -->
                <div class="modal fade" id="detailModal{{ $p->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $p->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalLabel{{ $p->id }}">{{ $p->nama_produk }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                            </div>
                            <div class="modal-body" style="max-height: 70vh; overflow-y: auto;">
                                <img src="{{ asset(Storage::url($p->foto_produk) ?? 'default.jpg') }}" class="img-fluid mb-3 d-block mx-auto" alt="Foto Produk">
                                <ul class="list-group">
                                    <li class="list-group-item"><strong>Nama Produk:</strong> {{ $p->nama_produk }}</li>
                                    <li class="list-group-item"><strong>Deskripsi:</strong> {{ $p->deskripsi }}</li>
                                    <li class="list-group-item"><strong>Stok:</strong> {{ $p->stok }}</li>
                                    <li class="list-group-item"><strong>Harga:</strong> Rp {{ number_format($p->harga, 0, ',', '.') }}</li>
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
    <!-- End Konten Produk -->
</div>

</div>
@endsection