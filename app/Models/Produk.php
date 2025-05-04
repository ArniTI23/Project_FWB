<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';
    protected $fillable = ['id_user','id_kategori','nama_produk','deskripsi','stok','harga','foto_produk'];

    public function user(){
    return $this->belongsTo(Pengguna::class, 'id_user');
    }

    public function kategori(){
    return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    public function detailTransaksi(){
    return $this->hasMany(DetailTransaksi::class, 'id_produk');
    }

}
