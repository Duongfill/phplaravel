<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mau_sp extends Model
{
    use HasFactory;
    protected $table ='mau_sp';
    protected $fillable = ['id', 'tenmau_sp', 'them_gia','id_sp','image_mau'];
}
