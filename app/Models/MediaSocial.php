<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaSocial extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
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
}
