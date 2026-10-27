<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Impor namespace yang benar
use Illuminate\Database\Eloquent\Model;

class Portofolio1019 extends Model
{
    use HasFactory;

    protected $table = 'portofolio_1019';

    protected $fillable = [
        'nama',
        'profesi',
        'email',
        'telepon',
        'lokasi',
        'tentang_saya',
        'keahlian',
        'pengalaman_kerja',
        'pendidikan',
    ];
}
