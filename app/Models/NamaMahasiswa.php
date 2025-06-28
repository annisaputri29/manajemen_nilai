<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NamaMahasiswa extends Model
{
    use HasFactory;
    protected $table = 'daftar_mahasiswa';
    protected $guarded = ['id'];
}
