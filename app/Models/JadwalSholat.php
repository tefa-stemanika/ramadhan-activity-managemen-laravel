<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class JadwalSholat extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'jadwal_sholat';

    protected $guarded = ['id'];

    protected $keyType = ['string'];

    protected $fillable = [
        'tanggal',
        'imsak',
        'subuh',
        'terbit',
        'dhuha',
        'dzuhur',
        'ashar',
        'maghrib',
        'isya',
    ];
}
