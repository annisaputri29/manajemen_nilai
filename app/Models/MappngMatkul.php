<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MappngMatkul extends Model
{
    use HasFactory;
    protected $table = 'mapping_matkul';
    protected $guarded = ['id'];
}
