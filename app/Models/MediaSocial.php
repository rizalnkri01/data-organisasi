<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaSocial extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'pimpinan_utama_id',
        'pimpinan_kedua_id',
        'facebook',
        'instagram',
        'youtube',
        'tiktok',
        'website',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pimpinan_utama()
    {
        return $this->belongsTo(PimpinanUtama::class);
    }

    public function pimpinan_kedua()
    {
        return $this->belongsTo(PimpinanKedua::class);
    }
}
