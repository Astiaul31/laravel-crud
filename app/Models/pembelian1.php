<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembelian extends Model
{
    use HasFactory;
     // file apa saja yang bisa di isi
     public $fillable = ['nama', 'tgl_pembelian', 'nama_barang', 'harga', 'jumlah', 'total'];
     // membuat fitur created_at(kapan data dibuat) & updated_at (kapan data diedit)
     // aktif
     public $timestamps = true;
}
