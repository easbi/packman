<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = ['nama_penerima',  'jenis_diklat', 'jumlah', 'kategori', 'jasa_pengirim', 'status'];
}
