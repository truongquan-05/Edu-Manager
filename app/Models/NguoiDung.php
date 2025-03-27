<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NguoiDung extends Model
{
    /** @use HasFactory<\Database\Factories\NguoiDungFactory> */
    use HasFactory;

    protected $fillable = [
        'ho_ten',
        'email',
        'so_dien_thoai',
        'gioi_tinh',
        'ngay_sinh',
        'dia_chi',
        'trang_thai',
        'vai_tro_id'
    ];
    public function vaitro()
    {
        return $this->belongsTo(VaiTro::class, 'vai_tro_id', 'id');
    }
}



