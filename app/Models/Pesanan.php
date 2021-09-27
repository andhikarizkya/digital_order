<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $fillable = ['no_meja', 'nama_pemesan', 'no_telpon', 'jumlah_menu', 'total_harga', 'time'];
}
