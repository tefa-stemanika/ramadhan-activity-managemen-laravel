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
}
