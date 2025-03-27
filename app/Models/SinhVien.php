<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SinhVien extends Model
{
    use HasFactory;
    protected $fillable = [
        'ma_sinh_vien',
        'chuyen_nganh',
        'nguoi_dung_id'
    ];
}