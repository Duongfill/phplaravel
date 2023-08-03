<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bills_ban extends Model
{
    use HasFactory;
    protected $table ='bills_ban';
    protected $fillable = ['id', 'id_kh', 'date_order', 'tong_tien','payment', 'note'];

}
