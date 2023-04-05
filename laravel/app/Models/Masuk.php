<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masuk extends Model
{
    use HasFactory;

    protected $table = 'brg_masuk';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_barang',
        'id_user',
        'jml_brg_masuk',
    ];

    public function barang(){
        return $this->belongsTo (Barang::class, 'id_barang');
    }

    public function user(){
        return $this->belongsTo (User::class, 'id_user');
    }

    public function kategori(){
        return $this->belongsTo (Kategori::class, 'id');
    }
}
