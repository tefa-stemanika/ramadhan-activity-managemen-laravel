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
        'nama',
        'kode_kelas',
        'username'
    ];
}
