<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    protected $fillable = ['file'];
    public $timestamps = true;
    public function User()
    {
        return $this->belongsTo(User::Class, 'id_user');
    }
  
}
