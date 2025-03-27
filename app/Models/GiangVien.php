<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiangVien extends Model
{
    use HasFactory;
    protected $fillable = [
        'ma_giang_vien',
        'chuyen_nganh',
        'nguoi_dung_id'
    ];
}