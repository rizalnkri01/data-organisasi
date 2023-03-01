<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PimpinanKedua extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'pimpinan_utama_id',
        'name_pimpinan_kedua',
    ];

    public function pimpinan_utama()
    {
        return $this->belongsTo(PimpinanUtama::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
