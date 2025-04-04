<?php

namespace App\Http\Controllers\Admin;

use App\Models\LopHoc;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LopHocController extends Controller
{
    /**
     * Hiển thị danh sách lớp học.
     */
    public function index()
    {
        $lopHocs = LopHoc::with(['giangVien'])->get();

        return view('admin.pages.lophoc', compact('lopHocs', ));
    }


    public function create()
    {
        return view('admin.pages.lophoc_create');
    }

    /**
     * Lưu lớp học mới vào cơ sở dữ liệu.
     */
    public function store(Request $request)
    {
        // Validate dữ liệu
        $request->validate([
            'ten_lop' => 'required|string|max:255',
            'ma_lop_hoc' => 'required|string|max:50|unique:lop_hocs,ma_lop_hoc',
            'so_luong' => 'required|integer|min:1',
            'phong_hoc' => 'required|string|max:100',
            'giang_vien_id' => 'nullable|exists:giang_viens,id',
            'mon_hoc_id' => 'nullable|exists:mon_hocs,id',
            'ca_hoc' => 'required|string|max:50',
            'thoi_gian_hoc' => 'required|string|max:50',
            'ngay_bat_dau' => 'required|date',
            'ngay_ket_thuc' => 'required|date|after_or_equal:ngay_bat_dau',
        ]);

        // Tạo lớp học mới
        LopHoc::create($request->all());

        // Chuyển hướng về danh sách lớp học với thông báo thành công
        return redirect()->route('admin.lophoc.index')->with('success', 'Lớp học đã được tạo thành công.');
    }

    /**
     * Hiển thị chi tiết lớp học.
     */
    public function show(LopHoc $lopHoc)
    {
        return view('admin.pages.lophoc_show', compact('lopHoc'));
    }

    public function edit(LopHoc $lopHoc)
    {
        return view('admin.pages.lophoc_edit', compact('lopHoc'));
    }

    public function update(Request $request, LopHoc $lopHoc)
    {
        $request->validate([
            'ten_lop' => 'required|string|max:255',
            'ma_lop_hoc' => 'required|string|max:50|unique:lop_hocs,ma_lop_hoc,' . $lopHoc->id,
            'so_luong' => 'required|integer|min:1',
            'phong_hoc' => 'required|string|max:100',
            'giang_vien_id' => 'nullable|exists:giang_viens,id',
            'mon_hoc_id' => 'nullable|exists:mon_hocs,id',
            'ca_hoc' => 'required|string|max:50',
            'thoi_gian_hoc' => 'required|string|max:50',
            'ngay_bat_dau' => 'required|date',
            'ngay_ket_thuc' => 'required|date|after_or_equal:ngay_bat_dau',
        ]);
        $lopHoc->update($request->all());

        return redirect()->route('admin.lophoc.index')->with('success', 'Lớp học đã được cập nhật thành công.');
    }

    public function destroy(string $id)
{
    $lopHoc = LopHoc::find($id);

    if (!$lopHoc) {
        return redirect()->route('admin.lophoc.index')->with('error', 'Lớp học không tồn tại.');
    }

    $lopHoc->delete();

    return redirect()->route('admin.lophoc.index')->with('message', 'Lớp học đã được xóa thành công.');
}
}
