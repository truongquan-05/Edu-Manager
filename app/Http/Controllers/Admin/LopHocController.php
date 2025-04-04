<?php

namespace App\Http\Controllers\Admin;

use App\Models\LopHoc;
use App\Models\MonHoc;
use App\Models\SinhVien;
use App\Models\GiangVien;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\NguoiDung;
use App\Models\SinhVienLop;

class LopHocController extends Controller
{
    /**
     * Hiển thị danh sách lớp học.
     */
    public function index()
    {
        $lopHocs = LopHoc::with(['giangVien'])
            ->with('monHoc')
            ->get();

        return view('admin.pages.lophoc.lophoc', compact('lopHocs'));
    }


    public function create()
    {
        $giangviens = GiangVien::with('nguoidung')->get();
        $monhocs = MonHoc::orderBy('id', 'DESC')->get();
        $sinhviens = SinhVien::with('nguoidung')->get();
        return view(
            'admin.pages.lophoc.create',
            compact('giangviens', 'monhocs', 'sinhviens')
        );
    }

    /**
     * Lưu lớp học mới vào cơ sở dữ liệu.
     */
    public function store(Request $request)
    {
        if ($request->get('mon_hoc_id') == 0) {
            return back()->with('message', 'Chưa chọn môn học');
        }
        if ($request->get('giang_vien_id') == 0) {
            return back()->with('message', 'Chưa chọn giảng viên');
        }

        $data_sv = $request->get('sinh_vien_id');
        $sv = array_map('trim', explode(',', $data_sv));
        if (count($sv) <= 1) {
            return back()->with('message', 'Tối thiểu 2 sinh viên');
        }

        $lophoc = LopHoc::create($request->all());
        $id = $lophoc->id;
        $data = [];
        for ($i = 0; $i < count($sv); $i++) {
            $data[] = [
                'lop_hoc_id' => $id,
                'sinh_vien_id' => $sv[$i]
            ];
        }

        SinhVienLop::insert($data);
        return redirect()->route('admin.lophoc.index')->with('message', 'Lớp học đã được tạo thành công.');
    }

    /**
     * Hiển thị chi tiết lớp học.
     */
    public function show(LopHoc $lopHoc)
    {
        return view('admin.pages.lophoc_show', compact('lopHoc'));
    }

    public function edit($id)
    {
        $lophoc = LopHoc::with('giangVien')->find($id);
        $giangviens = GiangVien::with('nguoidung')->get();
        $giangvien = (GiangVien::find($lophoc->giangVien->id))->nguoidung;

        $monhocs = MonHoc::orderBy('id', 'DESC')->get();
        $monhoc = MonHoc::find($lophoc->monHoc->id);
        $sinhviens = SinhVien::with('nguoidung')->get();

        $sinhvienLop = SinhVienLop::where('lop_hoc_id', $id)->get();
        return view(
            'admin.pages.lophoc.edit',
            compact('giangviens', 'monhocs', 'sinhviens', 'lophoc', 'giangvien', 'monhoc', 'sinhvienLop')
        );
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $lophoc = LopHoc::find($id);
        $lophoc->update($data);

        $data_sv = $request->get('sinh_vien_id');
        $sv = array_map('trim', explode(',', $data_sv));

        $allSvLop = SinhVienLop::where('lop_hoc_id', $id)->get();


        for ($i = 0; $i < count($sv); $i++) {
            $svLop = SinhVienLop::where('lop_hoc_id', $id)
                ->where('sinh_vien_id', $sv[$i])
                ->get();

            if ($svLop->isEmpty()) {
                SinhVienLop::create([
                    'lop_hoc_id' => $id,
                    'sinh_vien_id' => $sv[$i]
                ]);
            }
        }

        if (count($allSvLop) > count($sv)) {
            SinhVienLop::where('lop_hoc_id', $id)->delete();
            for ($i = 0; $i < count($sv); $i++) {

                SinhVienLop::create([
                    'lop_hoc_id' => $id,
                    'sinh_vien_id' => $sv[$i]
                ]);
            }
        }



        return redirect()->route('admin.lophoc.index')->with('message', 'Lớp học đã được cập nhật thành công.');
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
