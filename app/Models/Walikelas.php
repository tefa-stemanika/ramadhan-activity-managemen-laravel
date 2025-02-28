<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Walikelas extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = ['id'];

    protected $table = 'walikelas';

    protected $keyType = "string";

    protected $fillable = [
        'kode',
        'nama',
        'kode_kelas',
        'username'
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kode_kelas', 'kode');
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'username', 'username');
    }
}
