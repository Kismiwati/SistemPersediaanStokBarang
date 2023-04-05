<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ukuran extends Model
{
    use HasFactory;

    protected $table = 'ukuran';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'nama_ukuran',
    ];
}
