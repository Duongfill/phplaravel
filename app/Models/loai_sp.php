<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loai_sp extends Model
{
    use HasFactory;
    protected $table ='loai_sp';
    protected $fillable = ['id', 'hangdienthoai', 'Delet'];
}
