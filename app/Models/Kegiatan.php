<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = ['id'];

    protected $table = 'kegiatan';

    protected $keyType = "string";

    protected $fillable = [
        'nis',
        'jenis_kegiatan',
        'deskripsi',
        'foto',
    ];

    public function Kegiatan()
    {
        return $this->belongsTo(Siswa::class, 'nis', 'nis');
    }
}
