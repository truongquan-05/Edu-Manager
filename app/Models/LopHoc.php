<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LopHoc extends Model
{
    use HasFactory;

    // Các cột có thể gán giá trị hàng loạt
    protected $fillable = [
        'ma_lop_hoc',
        'so_luong',
        'phong_hoc',
        'giang_vien_id',
        'mon_hoc_id',
        'ca_hoc',
        'thoi_gian_hoc',
        'ngay_bat_dau',
        'ngay_ket_thuc',
        'chuyen_nganh'

    ];

    public function giangVien()
    {
        return $this->belongsTo(GiangVien::class, 'giang_vien_id', 'id');
    }
    public function monHoc()
    {
        return $this->belongsTo(MonHoc::class, 'mon_hoc_id', 'id');
    }
}
