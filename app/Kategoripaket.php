<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategoripaket extends Model
{
    protected $table = "master_kategori_paket";
    protected $fillable = [
    	'nama_kategori'
    ];
}
