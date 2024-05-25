<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;
    protected $table = 'laporans';
    protected $fillable = [
        'judul',
        'deskripsi',
        'foto',
        'status',
        'keterangan',
        'is_read',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lokasi()
    {
        return $this->hasOne(Lokasi::class);
    }
}
