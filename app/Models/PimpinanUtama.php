<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PimpinanUtama extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pimpinan_kedua()
    {
        return $this->belongsTo(PimpinanKedua::class);
    }

}
