<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = ['id_pesanan', 'status_transaksi', 'metode_pembayaran', 'time', 'id_user'];
}
