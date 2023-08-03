<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nha_cung_cap extends Model
{
    use HasFactory;
    protected $table ='nha_cung_cap';
    protected $fillable = ['id', 'ten_ncc', 'diachi_ncc','email','sdt'];
}
