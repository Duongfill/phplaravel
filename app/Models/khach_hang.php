<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class khach_hang extends Model
{
    use HasFactory;
    protected $table ='khach_hang';
    protected $fillable = ['id', 'ten_kh', 'email', 'dia_chi','sdt', 'note'];

}
