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
        'username'
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'username', 'username');
    }

    public function Siswa()
    {
        return $this->hasMany(Siswa::class, 'kode_kelas', 'kode');
    }
}
