<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

protected $guarded  = ['id'];

// relasi ke tabel category
public function category(){
    return $this->belongsTo(Category::class);
}

// relasi ketable peminjaman detail
public function peminjamanDetail(){
    return $this->hasMany(PeminjamanDetail::class);
}


}
