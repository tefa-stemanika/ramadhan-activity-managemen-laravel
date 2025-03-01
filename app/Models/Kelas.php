<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = [
        'id'
    ];

    protected $table = 'kelas';

    protected $keyType = "string";

    protected $fillable = [
        'kode',
        'nama',
        'kode_guru',
    ];

    public function Siswa()
    {
        return $this->hasMany(Siswa::class, 'kode_kelas', 'kode');
    }

    public function walikelas()
    {
        return $this->hasOne(WaliKelas::class, 'kode_kelas', 'kode');
    }

    public function Guru()
    {
        return $this->belongsTo(Guru::class, 'kode_guru', 'kode');
    }
}
