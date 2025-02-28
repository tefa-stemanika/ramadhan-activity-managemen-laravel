<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = ['id'];

    protected $table = 'siswa';

    protected $keyType = "string";

    protected $fillable = [
        'nis',
        'nama',
        'username',
        'kode_kelas'
    ];

    public function Kegiatan()
    {
        return $this->hasMany(Kegiatan::class, 'nis', 'nis');
    }

    public function Kelas()
    {
        return $this->belongsTo(Kelas::class, 'kode_kelas', 'kode');
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'username', 'username');
    }
}
