<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bill_detail_ban extends Model
{
    use HasFactory;
    protected $table ='bill_detail_ban';
    protected $fillable = ['id', 'id_bill_ban', 'id_sp', 'sl'];
}
