<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Berkas extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nik',
        'alamat',
        'nomer_hak',
        'luas_tanah',
        'tanggal_pengajuan',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
