<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rom extends Model
{
    use HasFactory;
    protected $table ='rom';
    protected $fillable = ['id', 'rom_name', 'them_gia','id_sp'];
}
