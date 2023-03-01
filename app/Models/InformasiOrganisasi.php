<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformasiOrganisasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'kondisi_organisasi',
        'no_sp',
        'sekretariatan',
        'periode',
        'ketua_pembina',
        'contact_pembina',
        'ketua',
        'contact_ketua',
        'komandan',
        'contact_komandan',
        'jumlah_pengurus',
        'total_alumni',
        'total_anggota',
        'total_anggota_lembaga',
        'link_sp',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function media_social()
    {
        return $this->belongsTo(MediaSocial::class);
    }
}
