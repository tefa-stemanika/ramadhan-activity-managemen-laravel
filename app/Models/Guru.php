<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = ['id'];

    protected $table = 'guru';

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

    public function Kelas()
    {
        return $this->hasMany(Kelas::class, 'kode_guru', 'kode');
    }
}
