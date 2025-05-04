<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $fillable = ['id_user','tanggal','status_pembayaran','status_pengiriman','total_harga'];

    public function user(){
    return $this->belongsTo(Pengguna::class, 'id_user');
    }

    public function detailTransaksi(){
    return $this->hasMany(DetailTransaksi::class, 'id_transaksi');
    }

}
