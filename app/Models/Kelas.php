<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = ['id'];

     protected $table = 'kelas';

    protected $keyType = "string";
    
    protected $fillable = [
        'nis',
        'nama',
        'kode_kelas'
    ];
}
