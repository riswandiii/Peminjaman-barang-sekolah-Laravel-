<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // relasi ke tabel user
    public function user(){
        return $this->belongsTo(User::class);
    }

    //relasi ketabel pinjamandetail
    public function peminjamanDetail(){
        return $this->hasMany(PeminjamanDetail::class);
    }

}
