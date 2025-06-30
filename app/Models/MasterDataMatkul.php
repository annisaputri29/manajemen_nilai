<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterDataMatkul extends Model
{
    use HasFactory;
    protected $table = 'master_data_matkul';
    protected $guarded = ['id'];
}
