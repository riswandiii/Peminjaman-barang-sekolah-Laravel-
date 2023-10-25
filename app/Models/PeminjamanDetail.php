<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanDetail extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // relasi ketble peminjaman
    public function peminjaman(){
        return $this->belongsTo(Peminjaman::class);
    }

    // relasi ketable barang
    public function barang(){
        return $this->belongsTo(Barang::class);
    }

}
