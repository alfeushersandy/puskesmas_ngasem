<?php

namespace App\Models;

use App\Http\Controllers\BarangController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';
    protected $primaryKey = 'id_kategori';
    protected $guarded = [];

    public function barang()
    {
        return $this->hasMany(Barang::class, 'id_kategori', 'id_kategori');
    }

    public function member()
    {
        return $this->hasMany(Member::class, 'id_kategori', 'id_kategori');
    }
}
