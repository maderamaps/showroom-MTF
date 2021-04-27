<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    use HasFactory;

    protected $table = 'reward';
    protected $fillable = ['file'];
    public $timestamps = false;
    public function Transaksi()
    {
        return $this->BelongsTo(transaksi::Class, 'id_transaksi');
    }
}
