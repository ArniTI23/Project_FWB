<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    protected $table = 'users';
    protected $fillable = ['nama','email','password','alamat','no_telepon','id_role'];

    
    public function role(){
    return $this->belongsTo(Role::class, 'id_role');
    }

    public function produk(){
    return $this->hasMany(Produk::class, 'id_user');
    }

    public function transaksi(){
    return $this->hasMany(Transaksi::class, 'id_user');
    }

}
