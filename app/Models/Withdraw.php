<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    use HasFactory;

    protected $table = 'reward';
    protected $fillable = ['file'];
    public $timestamps = true;
    public function User()
    {
        return $this->BelongsTo(user::Class, 'id_user');
    }
}
