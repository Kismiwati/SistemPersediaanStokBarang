<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_kategori',
        'id_warna',
        'id_ukuran',
        'nama_barang',
        'satuan',
        'stok',
        'harga',
        'foto',
    ];

    public function kategori(){
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }


    public function warna()
    {
        return $this->belongsTo(Warna::class, 'id_warna');
    }

    public function ukuran()
    {
        return $this->belongsTo(Ukuran::class, 'id_ukuran');
    }
}
