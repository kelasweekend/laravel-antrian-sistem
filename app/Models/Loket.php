<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loket extends Model
{
    use HasFactory;
    protected $guarded;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function antrian()
    {
        return $this->hasMany(Antrian::class, 'loket_id');
    }
}
