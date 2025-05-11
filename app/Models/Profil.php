<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    protected $table = 'profil';
    protected $fillable = [
        'user_id',
        'foto_profil',
        'bio',
        'deskripsi'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
