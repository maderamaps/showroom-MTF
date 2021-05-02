<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggan';
    protected $fillable = ['file'];
    public $timestamps = true;
    
    public function Transaksi()
    {
        return $this->belongsTo(Transaksi::Class, 'id_transaksi');
    }
}
