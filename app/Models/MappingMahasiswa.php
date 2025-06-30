<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MappingMahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mapping_mahasiswa';
    protected $guarded = ['id'];
}
