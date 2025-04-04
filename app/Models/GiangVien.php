<?php

namespace App\Models;

use App\Models\NguoiDung;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GiangVien extends Model
{
    use HasFactory;
    protected $fillable = [
        'ma_giang_vien',
        'chuyen_nganh',
        'nguoi_dung_id'
    ];
    public function nguoidung(){
        return $this->belongsTo(NguoiDung::class,'nguoi_dung_id','id');
    }
}